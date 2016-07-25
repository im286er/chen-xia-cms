<?php

class IndexController extends Controller
{
    public $uid;
	public $defaultAction = 'where';
    
	public function actionWhere(){
		$this->actionM(1);
	}
	
	//CallBack from Qiniu Response
	public function actionQiniuResponse()
	{
		/**Attension:CallBack Not Authorize From Qiniu Token
		   Just Check HTTP_USER_AGENT 
		*/
		header('Pragma: no-cache');
		header('Cache-Control: no-store');
		header('Content-type: application/json');
		$file=$_POST['file'];
		$uid=$_POST['uid'];
		$returnSuce = array("success"=>true,  "file"=>$file);
		$returnFail = array("success"=>false, "file"=>$file);
		if ($_SERVER['HTTP_USER_AGENT'] == "qiniu-callback/1.0") {
			$sql = "insert into ws_mv(mv,userid,name) values('$file',$uid,'$file')";
			Yii::app()->db->createCommand($sql)->execute();
			echo json_encode($returnSuce);
		} else {
			echo json_encode($returnFail);
		}
	}
	
    public function Myaccess($uid)
    {
        //Access Control
        $userConfig = Config::model();
        $sql = "select iaccess,background from {{webconfig}} where userid = $uid ";
        $userConfig  = $userConfig->findBySql($sql);
        
        if($userConfig['iaccess'] == 1 && empty(Yii::app()->session['uid'])) {
            $data['message'] = "I am Sorry~，用户设置了访问权限，你只有登录后才可访问。~";
            $data['backup'] = "/index/index";
            $data['params'] = array();
            $this->layout = "//layouts/error";
            $this->render("error",$data);
            die;
        }
        
        //Save Background to Sessiion
        if(!empty($userConfig['background'])) {
            $sql = "select picture from {{photo}} where id = ".$userConfig['background'];
            $url  = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
            $background = Yii::app()->db->createCommand($sql)->queryAll();
            Yii::app()->session['ws_backgroundofuser'] = !empty($background[0]['picture'])?$url.$background[0]['picture']:
            "http://wansun-iblog.qiniudn.com/ws_background_common.jpg";
        } else {
            Yii::app()->session['ws_backgroundofuser'] = "http://wansun-iblog.qiniudn.com/ws_background_common.jpg";
        }
    }
    
    //Pulic Get Tags
    public function getTags($uid)
    {
        $sql = "select * from {{label}} where userid = $uid order by sort asc ";
        $labelInfo = Yii::app()->db->createCommand($sql)->queryAll();
        return $labelInfo;
    }

	//Public UInfo
	public function getUInfo($uid)
	{
        $data = array();

		//Config
        $userConfig = Config::model();
        $sql = "select title,icon,seo,titlecolor,contentcolor from {{webconfig}} where userid = $uid ";
        $data['webconfig']  = $userConfig->findBySql($sql);
        
		//About
        $userModel = new User();
        $data['userInfo'] = $userModel->findByPk($uid);
        
        //Photo
        $photoModel = new Photo();
        $sql = "select * from {{photo}} where userid = $uid order by rand() limit 0,6";
        $data['photoInfo'] = $photoModel->findAllBySql($sql);
        
        //Lable
        $data['labelInfo'] = $this->getTags($uid);

		return $data;
	}
    
    //Web Index
    public function actionIndex()
    {
        $loginModel = new Login();
        $data['loginModel'] = $loginModel;
        $data['loginerror'] = 0;
        
        //Front Login
        if(isset($_POST['Login'])) {
            $loginModel->attributes = $_POST['Login'];
            if(!$loginModel->validate()) {
                $data['loginerror'] = 1;
            } else {
                $sql = "select id from {{user}} where username = '".$_POST['Login']['loginname'].
                     "' and password = '".md5($_POST['Login']['loginpass'])."' ";
                $LoginInfo = $loginModel->findBySql($sql);
                if($LoginInfo == NULL) {
                    $loginModel->addError("loginname", "用户名或密码错误！");
                    $data['loginerror'] = 1;
                } else {
                    Yii::app()->session['uid'] = $LoginInfo['id'];
                    $this->redirect(array("/index/m",'who'=>$LoginInfo['id']));
                }
            }
        }
        
        $userModel = User::model();
        $url  = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
        $sql = "select id,username,truename,nickname,headpicture from {{user}}";
        $data['users'] = $userModel->findAllBySql($sql);
        $data['url'] = $url;
        
		//Switch Layout
        $this->layout = "//layouts/register";
        $this->render("imain",$data);
    }
    
    //Async Get Blog
    public function actionG(){
        $uid = $_POST['who'];
		$tag = $_POST['taid'];
		$key = $_POST['keys'];
        $offset = $_POST['offset'];
        $pagesize = Yii::app()->params['blogCount'];
        $cutSize = 150;
		$where = array();
		$where[] = "hide=0";
		if (!empty($tag)) {$where[] = "b.labelid = $tag";}
		if (!empty($key)) {$where[] = "b.title like '%" .$key. "%'";}
		$where = implode(" and ", $where);
        $sql = "select b.*,b.id as bid,l.label,u.id from {{user}} u, {{blog}} b,{{label}} l ".
               "where b.userid = $uid and b.userid = u.id and b.labelid = l.id and $where order by b.time desc limit ".(($offset - 1) * $pagesize).",".$pagesize ;
        $blogs = Yii::app()->db->createCommand($sql)->queryAll();
        
        $sql = "select count(*) as allrecords from {{blog}} b where b.userid = $uid and hide=0 " ;
        $allRecord = Yii::app()->db->createCommand($sql)->queryAll();
        $allPages  = ceil( $allRecord[0]['allrecords'] / $pagesize ) ;
        
        foreach ($blogs as $key=>$b){
            $blogs[$key]['image'] = !empty($b['image']) ? GetImageFileName($b['image']) : "";
            if (date("Y-m-d") == date("Y-m-d" , $b['time'])) { 
			$blogs[$key]['time'] = "今天 " . date("H:i:s" , $b['time']) ; 
			} else if (date("Y-m-d",strtotime("-1 day")) == date("Y-m-d" , $b['time'])) {
				$blogs[$key]['time'] = "昨天 " . date("H:i:s" , $b['time']) ;
			}else if (date("Y-m-d",strtotime("-2 day")) == date("Y-m-d" , $b['time'])) {
				$blogs[$key]['time'] = "前天 " . date("H:i:s" , $b['time']) ;
			}
            else {
				$blogs[$key]['time']  = date("Y-m-d H:i:s" , $b['time']);
			}
            //$blogs[$key]['content'] = Helper::WordTruncate(strip_tags($b['content']),$cutSize,false);
			$blogs[$key]['content'] = "";
            $blogs[$key]['blogurl'] = $this->createUrl("index/c",array('who'=>$b['userid'],'id'=>$b['bid'])) ;
        }
        
        $data['blogs'] = $blogs;
        $data['url'] = Yii::app()->params['resurl'];
        $data['allpages'] = $allPages ;
        $data['adminurl'] = $this->createUrl("/admin/admin/index");
        echo json_encode($data);
    }
    
    
    //User Index
    public function actionM($who)
    {
        $uid = $who;
        $this->Myaccess($uid);
        $this->uid = $uid;
        $userExists = new User();
        $User = $userExists->findByPk($uid);
        if($User == NULL){
            $data['message'] = "~Sorry,你貌似跑到火星上去了，那儿木有你找的人，请速回地球吧# ~";
            $data['backup']     = "/index/index";
            $data['params']  = array();
            $this->layout = "//layouts/error";
            $this->render("error",$data);
            die;
        }
        $data = array(
            'uid' => $uid,
			'url' => Yii::app()->params['resurl'],
            //'url' => "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",

        );
		$data = array_merge($data, $this->getUinfo($uid));
        $this->layout = "//layouts/empty";
        $this->render('index',$data);
    }
    
    //Contact Me
    public function actionContact($who)
    {
        $this->uid = $uid = $who;
        $data = array(
            'uid' => $uid,
            'url' => "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",
        );
        $this->Myaccess($uid);
        
        $data['labelInfo'] = $this->getTags($uid);
        $contactModel = new Contact();
        
        if(isset($_POST['Contact'])) {
            $contactModel->attributes = $_POST['Contact'];
            $tmp = $_POST['Contact'];
            if($contactModel->validate()) {
                $contactModel->time = time();
                $contactModel->userid = $uid;
                $tmp['uid'] = $uid;
                if($contactModel->save()) {
                    Yii::app()->user->setFlash('contactstatus','YES，给Ta写信成功 :)');
                    $this->redirect(array("contact",'who'=>$uid));
                } else {
                    Yii::app()->user->setFlash('contactstatus','Sorry，系统错误，写信失败 :(');
                    $this->redirect(array("contact",'who'=>$uid));
                }
            }
        }
        
        $data['contactModel'] = $contactModel;
		$this->layout = "//layouts/empty";
        $this->render('contact',$data);
    }
    
    //Blog Content & Comment
    public function actionC($who,$id)
    {
        $uid = $who;
        $this->Myaccess($uid);
        $accessModel = Blog::model();
        $sql = "select readaccess , userid from {{blog}} where id = $id ";
        $accessModel = $accessModel->findBySql($sql);
        if($accessModel['readaccess'] == 1 && $accessModel['userid'] != Yii::app()->session['uid']) {
            $data['message'] = "哎哟，该文章设置了仅作者可见，你没有访问权限。:(";
            $this->layout = "//layouts/error";
            $this->render("error",$data);
            die;
        }
        $this->uid = $uid;
        
        $sql = "select userid from {{blog}} where id = $id";
        $userids = Yii::app()->db->createCommand($sql)->queryAll($sql);
        if($userids)
        {
            $userid = $userids[0]['userid'];
        } else {
            $userid = 0;
        }
		
        $comments = $this->GET_COMMENTS($id,0,$userid);
        $comments = $this->ShowComments($comments,0);
        $data['comments'] = $comments;

        $sql = "select count(id) as total from {{comment}} where pid = 0 and blogid = $id ";
        $totals = Yii::app()->db->createCommand($sql)->queryAll($sql);
        $data['total'] = $totals[0]['total'];
		
        //Add Views & Fresh Defence 
        if(Yii::app()->session['iviewed'] != $id || empty(Yii::app()->session['iviewed'])){
            $sql = "update {{blog}} set view = view+1 where id = $id ";
            Yii::app()->db->createCommand($sql)->execute();
            Yii::app()->session['iviewed'] = $id;
        }
        
        $data['uid'] = $uid;
        $data['url'] = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
		$data['music']    = $this->createUrl("/index/music/who/".$uid);
        $data['category'] = $this->createUrl("/index/contact/who/".$uid);
		$data['message']  = $this->createUrl("/index/contact/who/".$uid);
		
        $sql = "select l.label,b.*,b.id as bid,u.* from {{label}} l,{{user}} u,{{blog}} b where b.userid = $uid and b.userid = u.id and b.labelid = l.id and b.id = $id";
        $blogInfo  = Yii::app()->db->createCommand($sql)->queryAll();
        $data['blogInfo'] = $blogInfo;
        
        $data['labelInfo'] = $this->getTags($uid);
        $this->layout = "//layouts/empty";
        $this->render('content',$data);
    }
    
    function GET_COMMENTS($blogid,$pid,$userid)
    {
        $arr = array();
        $sql = "select * from {{comment}} where blogid = $blogid and pid = $pid ";
        if($pid == 0){
            $sql = "select * from {{comment}} where blogid = $blogid and pid = $pid order by time ";
		}
        
        $cms = Yii::app()->db->createCommand($sql)->queryAll($sql);
        foreach ($cms as $key=> $cs) {

            //Comment User Info
            if($cs['cuid'] != -1) {        //Register User
                $sql = "select username,headpicture from {{user}} where id = '".$cs['cuid']."' ";
                $tmp = Yii::app()->db->createCommand($sql)->queryAll($sql);
                if($tmp) {
                    $cs['username'] = $tmp[0]['username'];
                }
                if($cs['pid'] != 0 ) {
                    $sql = "select username as pusername from {{user}} where id = (select cuid from {{comment}} where id = ".$cs['pid']." )";
                    $tmp = Yii::app()->db->createCommand($sql)->queryAll($sql);
                    if($tmp) {
                        $cs['pusername'] = $tmp[0]['pusername'];
                    }
                } else {
                    $cs['pusername'] = "";
                }
                
            } else {                         //Visitor
                $cs['username'] = "匿名网友";
            }
            $cs['time']    = date("Y-m-d H:i:s",$cs['time']);
            $cs['bloguid'] = $userid;
            
            if($cs['pid'] == $pid ) {
                $cs['child'] = $this->GET_COMMENTS($blogid,$cs['id'],$userid);
                $arr[] = $cs;
            }
        }
        return $arr;
    }
    

    function ShowComments($comments,$space)
    {
        static $str = "";
        foreach ($comments  as $key=> $cm) {
            $cm['content'] = htmlspecialchars_decode($cm['content'],ENT_QUOTES);
            if($cm['child']) {
                $space = 0;
                if($cm['pid'] != 0)
                    $space++;
                $str .= "<div class='comment'>";
                if(!empty($cm['pusername'])) {
                    $str .= "<span style='font-style:italic;font-size:15px;'> ".$cm['username']." 回复 ".$cm['pusername']."&nbsp;".$cm['time']."</span>";
                } else {
                    $str .= "<span style='font-style:italic;font-size:15px;'> ".$cm['username']."&nbsp;".$cm['time']."</span>";
                }
                $str .= "<input type='hidden' class='parentid' value='".$cm['id']."'/>"."：&nbsp;".$cm['content'];
                
                if(empty(Yii::app()->session['uid'])) {
                    $str .= "</div>";
                } else {
                    $str .= "<a class='responsetarget' style='cursor:pointer;margin-left:5px;display:none;'>回复</a></div>";
                }
                $this->ShowComments($cm['child'],$space);
                
            } else {
                $space++;
                if($cm['pid'] == 0)
                    $space = 0;
                 $str .= "<div class='comment' >";
                if(!empty($cm['pusername'])) {
                    $str .= "<span style='font-style:italic;font-size:15px;'> ".$cm['username']." 回复 ".$cm['pusername']."&nbsp;".$cm['time']."</span>";
                } else {
                    $str .= "<span style='font-style:italic;font-size:15px;'> ".$cm['username']."&nbsp;".$cm['time']."</span>";
                }
                $str .= "<input type='hidden' class='parentid' value='".$cm['id']."'/>"."：".$cm['content'];
                    
                if(empty(Yii::app()->session['uid'])) {
                    $str .= "</div>";
                } else {
                    $str .= "<a class='responsetarget' style='cursor:pointer;margin-left:5px;display:none;'>回复</a></div>";
                }
                
            }
        }
        return $str;
    }
    
    //Async Comment
    public function actionAddComment()
    {
        $replytype = $_POST['replytype']; 
        $pid     = $_POST['parentid'];
        $content = htmlspecialchars($_POST['content'],ENT_QUOTES,"utf-8");
        $blogid  = $_POST['blogid'];
        $commtuid= empty(Yii::app()->session['uid'])?-1:Yii::app()->session['uid'];
        $time    = time();
        $ip = Yii::app()->request->userHostAddress;
        
        if(empty($content) || empty($blogid)) {
            return false;
        }
                    
        $sql = "insert into {{comment}} (content,blogid,time,ip,cuid,pid) values('".
			   $content."',$blogid,$time,'".$ip."',$commtuid,$pid)";
        $res = Yii::app()->db->createCommand($sql)->execute();
        $result = array();
        $result['pid'] = $pid;

        if($res) {
            
            //Successed Not Allow Next Comment
            if($replytype == 1) {    
                $sql = "update {{comment}} set reply =1 where id = $pid ";
                Yii::app()->db->createCommand($sql)->execute();
            }
            //Update All Comments Count
            if($pid == 0) {
                $sql = "update {{blog}} set message = message +1 where id = $blogid ";
                Yii::app()->db->createCommand($sql)->execute();
            }          
            
            //Return Comment Info
            $username = "";
            if($commtuid == -1) {
                $username = "匿名网友";
            } else {
                $sql  = "select username from {{user}} where id = $commtuid ";
                $user = Yii::app()->db->createCommand($sql)->queryAll();
                if($user){
                    $username = $user[0]['username'];
                }
            }
            $time = date("Y-m-d H:i:s",$time);
            $result['text'] = "<div class='comment'><span style='font-style:italic;font-size:15px;'> ".$username."&nbsp;".$time."</span>
                    <input type='hidden' class='parentid' value='".$pid."'/>
                    ：&nbsp;".$content."<a class='responsetarget' style='cursor:pointer;margin-left:5px;display:none;'>回复</a></div>";
            echo json_encode($result);
            
        } else {
            echo "fail";
        }
        exit;
    }
    
    //Search Blog
    public function actionSearch($uid,$s)
    {
        $this->Myaccess($uid);
        if($s == "search the site") {$s = "";}
        $this->uid = $uid;
        $data = array(
			'key'=> $s,
            'uid' => $uid,
            'url' => "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",
        );

		//UInfo
		$data = array_merge($data, $this->getUinfo($uid));       
        $this->layout = "//layouts/empty";
        $this->render('index',$data);
        
    }
    
    //Blog in Tags
    public function actionT($uid,$id)
    {
        $this->Myaccess($uid);
        $this->uid = $uid;
        $data = array(
            'uid' => $uid,
			'tid' => $id,
            'url' => "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",
        );
        //UInfo
		$data = array_merge($data, $this->getUinfo($uid));
		$this->layout = "//layouts/empty";
        $this->render('index',$data);
    }
    
    //Pictures
    public function actionJustlook($uid)
    {
        
        $this->Myaccess($uid);
        $photoModel = new Photo();
        $data['photoInfo']  = $photoModel->findAll('userid=:uid',array(':uid'=>$uid));
        if(empty($data['photoInfo'])) {
            $data  = array(
                'backup' => 'index/m',
                'params' => array('who'=>$uid),
                'message' => '~啊哟，相册里是空的，主人家没有上传过，回去看看别的吧~',
            );
            $this->renderPartial('error',$data);
            die;
            
        }
        $data['uid'] = $uid;
        $data['url'] = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
        $this->layout = "//layouts/illokit";
        $this->render('picture',$data);
        
    }
	
	public function actionMusic($who)
	{
		$uid = $who;
		$this->Myaccess($uid);
		$songModel = new Song();
		$data['musiclist'] = $songModel->findAll('userid=:uid', array(':uid'=>$uid));
		if (empty($data['musiclist'])) {
			$data['message'] = "Oh,Sorry~，Empty in Music List。~";
            $data['backup'] = "/index/index";
            $data['params'] = array();
            $this->layout = "//layouts/error";
            $this->render("error",$data);
            die;
		}
        $data['uid'] = $uid;
        $data['url'] = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
        $this->layout = "//layouts/illokit";
        $this->render('music',$data);
	}
    
    //User Register
    public function actionRegister()
    {
        $registerModel = new Register();
        if(isset($_POST['Register'])) {
            
            $post = $_POST['Register'];
            $registerModel->attributes = $post;
            
            if($registerModel->validate()) {
                //Check Exist
                $registerInfo = $registerModel->findBySql("select username from {{user}} where username = '".$post['username']."' ");
				
				//Not Allowed Register ---
				$data  = array(
                        'backup' => 'index/register',
                        'params' => array(),
                        'message' => '(⊙v⊙)，运气很背的说，你注册的号比人先注册了。TRY and Make a Change...',
                    );
                    $this->renderPartial('error',$data);
                die;
				//Not Allowed Register END
				
                if($registerInfo['username'] != NULL){    
                    
                    $data  = array(
                        'backup' => 'index/register',
                        'params' => array(),
                        'message' => '(⊙v⊙)，运气很背的说，你注册的号比人先注册了。TRY and Make a Change...',
                    );
                    $this->renderPartial('error',$data);
                    die;
                }
                
                $registerModel->password = md5($post['password']);
                if($registerModel->save() == true){

                    //Init Person Config
                    $configModel = new Config();
                    $configModel->userid = $registerModel->attributes['id'];
                    $configModel->iaccess = 0;
                    $configModel->save(false);
                    
                    //Menu
                    for($s=1;$s<3;$s++){
                        for($i=1;$i<7;$i++){
                            
                            $name = "自定义".$i;
                            $pid  = 0;
                            $sort = $i;
                            $link = "#";
                            $position = 1;
                            $uid  = $registerModel->attributes['id'];

                            //Top
                            if($s == 1){
                                
                                if($i == 1) {     //Index
                                    $link = $this->createUrl("/index/m/who/".$uid); 
                                    $name = "主页";
                                    
                                }
                                if($i == 3) {     //Drop Menu
                                    
                                    $sql = "insert into {{menu}} (name,pid,sort,link,position,userid) values('$name',$pid,$sort,'$link',$position,$uid)";
                                    if(Yii::app()->db->createCommand($sql)->execute()) {
                                        
                                        $pid = Yii::app()->db->getLastInsertID();
                                        for($j=1;$j<4;$j++) {
                                            
                                            $name = "下拉菜单".$j;
                                            $sort = $j;
                                            $sql = "insert into {{menu}} (name,pid,sort,link,position,userid)      values('$name',$pid,$sort,'$link',$position,$uid)";
                                            Yii::app()->db->createCommand($sql)->execute();
                                        }
                                    }
                                    continue;
                                }
                                if($i == 2) {
                                    $name = "私信给我";
                                    $link = $this->createUrl("/index/contact/who/".$uid); 
                                }
                                
                                if($i == 5) {
                                    $name = "视频播客".$i;
                                }
                                
                                if($i == 4) {
                                    $name = "我的音乐";
									$link = $this->createUrl("/index/music/who/".$uid);
                                }
                            }
                            
                            //DOWN
                            if($s == 2) {
                                
                                $position = 2;
                                if($i == 1) {
                                    $name = "版权所有 walksun Copyright 2014 - 2015";
                                }
                                if($i == 6) {
                                    $name = "管理助手";
                                    $link = $this->createUrl("/admin/admin/index");
                                }
                                
                            }

                            $sql = "insert into {{menu}} (name,pid,sort,link,position,userid) values('$name',$pid,$sort,'$link',$position,$uid)";
                            Yii::app()->db->createCommand($sql)->execute();
                        }
                    }
                    
                    Yii::app()->session['uid'] = $registerModel->attributes['id'];
                    $this->redirect(array("/index/m/who/".$registerModel->attributes['id']));
                    
                } else {
                    $data  = array(
                        'backup' => 'index/index/register',
                        'message' => ':( ，运气很背的说，你注册的号比你先注册了。',
                    );
                    $this->renderPartial('error',$data);
                }
            }
        }
        
        $data = array('registerModel'=>$registerModel,"backup"=>"index/index",'login'=>'admin/login/index');
        $this->layout = '//layouts/register';
        $this->render('iregister',$data);
    }
    
    
    
    //CheckCode
    public function actions() 
    {
        return array(
            'captcha' => array(
                'class' => 'system.web.widgets.captcha.CCaptchaAction',
                'width' => '128',
                'height'=> '50',
                'backColor'=>0xFFFFFF,
                'foreColor'=>0x212121,
                'padding'=>5,
                'minLength'=>  4,
                'maxLength'=> 4,
                'transparent'=>true,
                
            ),
        );
    }
    
    //Logout
    public function actionOut()
    {
        Yii::app()->user->logout();
        $this->redirect(array('index'));
    }
}

?>
