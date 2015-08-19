<?php

class IndexController extends Controller
{
    
    public $uid;
    
    public function Myaccess($uid)
    {
        
        //访问权限控制
        $userConfig = Config::model();
        $sql = "select iaccess,background from {{webconfig}} where userid = $uid ";
        $userConfig  = $userConfig->findBySql($sql);

        if($userConfig['iaccess'] == 1 && empty(Yii::app()->session['uid'])) {
            
            $data['message'] = "I am Sorry~，用户设置了访问权限，你只有登录后才可访问。~";
            $data['backup']     = "/index/index";
            $data['params']  = array();
            
            $this->layout = "//layouts/error";
            $this->render("error",$data);
            die;
        }
        
        //存储用户皮肤背景到session
        if(!empty($userConfig['background'])) {
            $sql = "select picture from {{photo}} where id = ".$userConfig['background'];
            $url  = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
            $background = Yii::app()->db->createCommand($sql)->queryAll();
            Yii::app()->session['ws_backgroundofuser'] = !empty($background[0]['picture'])?$url.$background[0]['picture']:"http://wansun-iblog.qiniudn.com/ws_background_common.jpg";

        } else {
            Yii::app()->session['ws_backgroundofuser'] = "http://wansun-iblog.qiniudn.com/ws_background_common.jpg";
        }
        
    }
    
    
    //公用函数 获取标签
    public function GetTags($uid)
    {
        
        $sql = "select * from {{label}} where userid = $uid order by sort asc ";
        $labelInfo = Yii::app()->db->createCommand($sql)->queryAll();
        return $labelInfo;
    }
    
    
    //网站首页 
    public function actionIndex()
    {

        $loginModel = new Login();
        $data['loginModel'] = $loginModel;
        $data['loginerror'] = 0;
        
        //前台登陆
        if(isset($_POST['Login'])) {
            
            $loginModel->attributes = $_POST['Login'];
            
            if(!$loginModel->validate()) {
                $data['loginerror'] = 1;
            } else {
                
                $sql = "select id from {{user}} where username = '".$_POST['Login']['loginname']."' and password = '".md5($_POST['Login']['loginpass'])."' ";
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
        $sql = "select id,username,headpicture from {{user}}";
        $data['users'] = $userModel->findAllBySql($sql);
        $data['url'] = $url;
        
        
        //切换布局
        $this->layout = "//layouts/register";
        $this->render("imain",$data);

    }
    
    //异步获取文章
    public function actionG(){
        
        $uid = $_POST['who'];
        $offset = $_POST['offset'];
        $pagesize = Yii::app()->params['blogCount'];
        $cutSize = 150;
        $sql = "select b.*,b.id as bid,l.label,u.* from {{user}} u, {{blog}} b,{{label}} l where b.userid = $uid and b.userid = u.id and b.labelid = l.id order by b.time desc limit " .(($offset - 1) * $pagesize).",".$pagesize ;
        $blogs = Yii::app()->db->createCommand($sql)->queryAll();
        //file_put_contents("./tmp.txt", $sql."\r\n",FILE_APPEND);
        
        $sql = "select count(*) as allrecords from {{blog}} b where b.userid = $uid " ;
        $allRecord = Yii::app()->db->createCommand($sql)->queryAll();
        $allPages  = ceil( $allRecord[0]['allrecords'] / $pagesize ) ;
        
        
        /**
         * 结果集处理
         * 1.图片缩放
         * 2.截取文字
         */
        foreach ($blogs as $key=>$b){
            $blogs[$key]['image'] = !empty($b['image']) ? GetImageFileName($b['image']) : "";
            
			if (date("Y-m-d") == date("Y-m-d" , $b['time'])) { $blogs[$key]['time'] = "今天 " . date("H:i:s" , $b['time']) ; }
			else if (date("Y-m-d",strtotime("-1 day")) == date("Y-m-d" , $b['time'])) { $blogs[$key]['time'] = "昨天 " . date("H:i:s" , $b['time']) ;  }
			else if (date("Y-m-d",strtotime("-2 day")) == date("Y-m-d" , $b['time'])) { $blogs[$key]['time'] = "前天 " . date("H:i:s" , $b['time']) ;  }
			else { $blogs[$key]['time']  = date("Y-m-d H:i:s" , $b['time']); }
            $blogs[$key]['content'] = Helper::WordTruncate(strip_tags($b['content']),$cutSize,false);
            $blogs[$key]['blogurl'] = $this->createUrl("index/c",array('who'=>$b['userid'],'id'=>$b['bid'])) ;
        }
        
        //分两种方式显示
        $data['blogs'] = $blogs;
        $data['url'] = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
        $data['allpages'] = $allPages ;
        echo json_encode($data);
    }
    
    
    //用户主页
    public function actionM($who)
    {
        
        $uid = $who;
        
        //访问限制
        $this->Myaccess($uid);
        
        
        //加载布局uid
        $this->uid = $uid;
        
        //用户是否存在
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

        
        //前台数据
        $data = array(
            'uid'    =>    $uid,
            'url'    =>    "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",
        );

        //用户偏好
        $userConfig = Config::model();
        $sql = "select titlecolor,contentcolor from {{webconfig}} where userid = $uid ";
        $data['color']  = $userConfig->findBySql($sql);

        //关于我
        //$userModel = new User();
        //$data['userInfo'] = $userModel->findByPk($uid);
        
        
        //相册
        //$photoModel = new Photo();
        //$sql = "select * from {{photo}} where userid = $uid order by rand() limit 0,6";
        //$data['photoInfo'] = $photoModel->findAllBySql($sql);
        
        
        //标签
        //$data['labelInfo'] = $this->GetTags($uid);
        
        $this->layout = "//layouts/content";
        $this->render('index',$data);
    }
    
    
    
    //联系我ui
    public function actionContact($uid)
    {
        
        $this->uid = $uid;
        $data = array(
            'uid'    =>    $uid,
            'url'    =>    "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",
        );
        
        //标签
        $data['labelInfo'] = $this->GetTags($uid);
        $contactModel = new Contact();
        
        if(isset($_POST['Contact'])) {
            $contactModel->attributes = $_POST['Contact'];
            $tmp = $_POST['Contact'];
            if($contactModel->validate()) {
                $contactModel->time = time();
                $contactModel->userid = $uid;
                
                $tmp['uid'] = $uid;
                if($contactModel->save()) {
                    Yii::app()->user->setFlash('contactstatus','YES，给Ta写信成功。(⊙_⊙)(⊙_⊙)(⊙_⊙)');
                    //$this->SendContactMessage($tmp);
                    $this->redirect(array("contact",'uid'=>$uid));
                } else {
                    Yii::app()->user->setFlash('contactstatus','Sorry，系统错误，写信失败。(＞﹏＜)');
                    $this->redirect(array("contact",'uid'=>$uid));
                }
            }
            
        }
        
        $data['contactModel'] = $contactModel;
        $this->render('contact',$data);
    }
    
    //收到私信后邮件通知
    public function SendContactMessage($data) {
        
        if(empty($data['tourist']))
        {
            $data['tourist'] = "匿名网友";
        }
        if(!empty($data['uid']))
        {
            $sql = "select qq from {{user}} where id = ".$data['uid'];
            $res = Yii::app()->db->createCommand($sql)->queryAll($sql);
            if(empty($res[0]['qq']))
                return false;
        } else {
            return false;
        }
        
        $manageurl = "walksun.cn/iblog/admin/login/index";
        Yii::import('application.vendors.*'); 
        require_once('PHPMailer/smtp.class.php');
        //$smtpserver = "SMTP.163.com";　        //您的smtp服务器的地址 
        $smtpserver = Yii::app()->params['smtpserver']; 
        $port = 25;                             //smtp服务器的端口，一般是 25 
        $smtpuser = Yii::app()->params['smtpuser'];         //您登录smtp服务器的用户名 
        $smtppwd  = Yii::app()->params['smtppassword'];     //您登录smtp服务器的密码 
        $mailtype = "HTML";                     //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件 
        $sender = "zhuwanxiong@sina.com"; 
        //发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败 
        $smtp = new smtp($smtpserver,$port,true,$smtpuser,$smtppwd,$sender); 
        //$smtp->debug = true;                     //是否开启调试,只在测试程序时使用，正式使用时请将此行注释 
        //$to = "zhuwanxiong@gmail.com";         //收件人 
        $subject = $data['subject']; 
        $body = "你好，“".$data['tourist']."”在微博客(walksun.cn)上对你说：<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$data['message']."<br/><a href='".$manageurl."' target='_blank'>点击查看</a>，链接失效请点击".$manageurl; 
        
        $tos = array(
            $res[0]['qq']."@qq.com"
        );
        foreach($tos as $to) {
            $send=$smtp->sendmail($to,$sender,$subject,$body,$mailtype); 
        }
        if($send==1) { 
            //echo "邮件发送成功"; 
            return true;
        } else { 
            //echo "邮件发送失败<br/>"; 
            //echo "原因：".$this->smtp->logs; 
            return false;
        } 
        
    }
    
    
    
    //文章内容及评论
    public function actionC($who,$id)
    {

        $uid = $who;

        //访问限制
        $this->Myaccess($uid);
        
        //权限验证
        $accessModel = Blog::model();
        $sql = "select readaccess , userid from {{blog}} where id = $id ";
        $accessModel = $accessModel->findBySql($sql);
        if($accessModel['readaccess'] == 1 && $accessModel['userid'] != Yii::app()->session['uid']) {
            
            $data['message'] = "哎哟，该文章设置了仅作者可见，你没有访问权限。:(";
            $data['backup']     = "/index/index";
            $data['params']     = array();
            
            $this->layout = "//layouts/error";
            $this->render("error",$data);
            die;
        }
        
        $this->uid = $uid;
        
                    
        
        //博文所属用户id
        $sql     = "select userid from {{blog}} where id = $id";
        $userids = Yii::app()->db->createCommand($sql)->queryAll($sql);
        if($userids)
        {
            $userid = $userids[0]['userid'];
        } else {
            $userid = 0;
        }
        
        //获取评论
        $comments = $this->GET_COMMENTS($id,0,$userid);
        
        
        //递归评论显示到视图
        $comments = $this->ShowComments($comments,0);
        $data['comments'] = $comments;
        
        
        
        //评论总数
        $sql = "select count(id) as total from {{comment}} where pid = 0 and blogid = $id ";
        $totals = Yii::app()->db->createCommand($sql)->queryAll($sql);
        $data['total'] = $totals[0]['total'];
        
        
        
        //增加浏览量    防止刷新
        if(Yii::app()->session['iviewed'] != $id || empty(Yii::app()->session['iviewed'])){
            
            $sql = "update {{blog}} set view = view+1 where id = $id ";
            Yii::app()->db->createCommand($sql)->execute();
            Yii::app()->session['iviewed'] = $id;
        }
        
        
        $data['uid'] = $uid;
        $data['url'] = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
        
        
        //1文章
        $sql = "select l.label,b.*,b.id as bid,u.* from {{label}} l,{{user}} u,{{blog}} b where b.userid = $uid and b.userid = u.id and b.labelid = l.id and b.id = $id";
        $blogInfo  = Yii::app()->db->createCommand($sql)->queryAll();
        $data['blogInfo'] = $blogInfo;
        
        //2标签
        $data['labelInfo'] = $this->GetTags($uid);
        
        
        $this->render('content',$data);
    }
    
    
    //递归查询评论
    /***
     * 参数说明
     * 1.blogid博文id 
     * 2.pid 默认为0 之后为博文id
     * 3.userid 为用户id
     */
    function GET_COMMENTS($blogid,$pid,$userid)
    {

        $arr = array();
        $sql = "select * from {{comment}} where blogid = $blogid and pid = $pid ";
        if($pid == 0)
            $sql = "select * from {{comment}} where blogid = $blogid and pid = $pid order by time ";
        
        $cms = Yii::app()->db->createCommand($sql)->queryAll($sql);

        foreach ($cms as $key=> $cs) {

            //添加评论人信息
            if($cs['cuid'] != -1) {        //注册用户
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
                
            } else {                    //游客评论
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
    
    /***
     * 递归显示评论到视图
     */
    function ShowComments($comments,$space)
    {
        
        static $str = "";
        foreach ($comments  as $key=> $cm) {
            
            if($cm['child']) {
                
                $space = 0;
                if($cm['pid'] != 0)
                    $space++;
                $str .= "<div class='comment' style='padding-left:".(50*$space)."px'>
                    <input type='hidden' class='parentid' value='".$cm['id']."'/>
                    <div class='commenttext'>".$cm['content']."</div>
                    <div class='author'><span></span>";
                if(!empty($cm['pusername'])) {
                    $str .= $cm['username']." 回复 ".$cm['pusername']."<span> </span>".$cm['time']."<span></span>";
                } else {
                    $str .= $cm['username']."<span> </span>".$cm['time']."<span></span>";
                }
                
                
                if(empty(Yii::app()->session['uid'])) {
                    $str .= "</div></div>";
                } else {
                    $str .= "<a class='responsetarget' style='cursor:pointer;margin-left:5px;display:none;'>回复</a></div></div>";
                }
                
                /**只能评论一级 一问一答模式
                 if(empty(Yii::app()->session['uid'])){
                    $str .= "</div></div>";
                }else{
                    if($cm['reply'] == 1){
                            $str .= "</div></div>";
                    }else{
                        if(Yii::app()->session['uid'] != $cm['cuid'] && Yii::app()->session['uid'] == $cm['bloguid']){
                            $str .= "<a class='responsetarget' style='cursor:pointer;'>回复</a></div>
                             </div>";
                        }else{
                            $str .= "</div></div>";
                        }
                        
                    }
                }
                 */
                
                
                $this->ShowComments($cm['child'],$space);
                
            } else {
                
                $space++;
                if($cm['pid'] == 0)
                    $space = 0;
                
                $str .= "<div class='comment' style='padding-left:".(50*$space)."px'>
                    <input type='hidden' class='parentid' value='".$cm['id']."'/>
                    <div class='commenttext'>".$cm['content']."</div>
                    <div class='author'><span></span>";
                if(!empty($cm['pusername'])) {
                    $str .= $cm['username']." 回复 ".$cm['pusername']."<span> </span>".$cm['time']."<span></span>";
                } else {
                    $str .= $cm['username']."<span> </span>".$cm['time']."<span></span>";
                }
                    
                if(empty(Yii::app()->session['uid'])) {
                    $str .= "</div></div>";
                } else {
                    $str .= "<a class='responsetarget' style='cursor:pointer;margin-left:5px;display:none;'>回复</a></div></div>";
                }
                
                /**只能评论一级 一问一答模式
                 if(empty(Yii::app()->session['uid'])){
                    $str .= "</div></div>";
                }else{
                    if($cm['reply'] == 1){
                            $str .= "</div></div>";
                    }else{
                        if(Yii::app()->session['uid'] != $cm['cuid'] && Yii::app()->session['uid'] == $cm['bloguid']){
                            $str .= "<a class='responsetarget' style='cursor:pointer;'>回复</a></div>
                             </div>";
                        }else{
                            $str .= "</div></div>";
                        }
                        
                    }
                }
                 */
                
            }
        }

        return $str;
        
    }
    
    
    
    //异步添加评论
    public function actionAddComment()
    {
        
        $replytype = $_POST['replytype']; 
        $pid     = $_POST['parentid'];
        $content = $_POST['content'];
        $blogid  = $_POST['blogid'];
        $commtuid= empty(Yii::app()->session['uid'])?-1:Yii::app()->session['uid'];
        $time    = time();
        $ip = Yii::app()->request->userHostAddress;
        
        if(empty($content) || empty($blogid)) {
            return false;
        }
                    
        $sql = "insert into {{comment}} (content,blogid,time,ip,cuid,pid) values('".$content."',$blogid,$time,'".$ip."',$commtuid,$pid)";
        $res = Yii::app()->db->createCommand($sql)->execute();
        
        $result = array();
        $result['pid'] = $pid;
    
        if($res) {
            
            //评论成功后禁止下次评论
            if($replytype == 1) {    
                $sql = "update {{comment}} set reply =1 where id = $pid ";
                Yii::app()->db->createCommand($sql)->execute();
            }
            
            //更新blog表中评论总数
            if($pid == 0) {
                $sql = "update {{blog}} set message = message +1 where id = $blogid ";
                Yii::app()->db->createCommand($sql)->execute();
            }
            
            //通知文章发表人  自己评论时不发邮件
            /*
            $sql  = "select userid from {{blog}} where id = $blogid";
            $bloguid = Yii::app()->db->createCommand($sql)->queryAll();
            if($bloguid[0]['userid'] != $commtuid){
                $this->SendEvaluationMessage($blogid,$content);
            }
            */            
            
            //返回当前评论信息  1.用户名  2.评论内容  3.评论时间
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
            $result['text'] = "<div class='comment' style='padding-left:'>
                    <input type='hidden' class='parentid' value='".$pid."'/>
                    <div class='commenttext'>".$content."</div>
                    <div class='author'><span></span>".$username."<span> </span>".$time."<span></span>";
            echo json_encode($result);
            
            
        } else {
            echo "fail";
        }
        die;
        
    }
    
    //博文搜索
    public function actionSearch($uid,$s)
    {
        
        $this->Myaccess($uid);
        
        if($s == "search the site")
            $s = "";
        
        //加载布局uid
        $this->uid = $uid;
        
        $data = array(
            'uid'    =>    $uid,
            'url'    =>    "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",
        );
        
        //关于我
        $userModel = new User();
        $data['userInfo'] = $userModel->findByPk($uid);
        
        //相册
        $photoModel = new Photo();
        $sql = "select * from {{photo}} where userid = $uid order by rand() limit 0,6";
        $data['photoInfo'] = $photoModel->findAllBySql($sql);
        
        //标签
        $data['labelInfo'] = $this->GetTags($uid);;
        
        //文章列表
        $cutSize = 200;        //截取字符数
        $sql = "select b.*,b.id as bid,l.label,u.* from {{user}} u, {{blog}} b,{{label}} l where b.userid = $uid and b.userid = u.id and b.labelid = l.id and b.title like '%$s%' order by b.time desc ";
        $criteria=new CDbCriteria();
        $result = Yii::app()->db->createCommand($sql)->query();
        $pages=new CPagination($result->rowCount);
        $pages->pageSize = Yii::app()->params['blogCount'];;
        $pages->applyLimit($criteria);
        $result=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
        $result->bindValue(':offset', $pages->currentPage*$pages->pageSize);
        $result->bindValue(':limit', $pages->pageSize);
        $blogs=$result->queryAll();
        
        /**
         * 结果集处理
         * 1.图片缩放
         * 2.截取文字
         */
        foreach ($blogs as $key=>$b) {
            $blogs[$key]['image'] = GetImageFileName($b['image']);
            $blogs[$key]['content'] = Helper::WordTruncate(strip_tags($b['content']),$cutSize,false);
        }

        $data['pages'] = $pages;
        $data['blogs'] = $blogs;
        
        $this->render('index',$data);
        
    }
    
    
    //标签下的博文
    public function actionT($uid,$id)
    {
        
        $this->Myaccess($uid);
        
        //加载布局uid
        $this->uid = $uid;
        
        $data = array(
            'uid'    =>    $uid,
            'url'    =>    "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/",
        );

        //关于我
        $userModel = new User();
        $data['userInfo'] = $userModel->findByPk($uid);

        //相册
        $photoModel = new Photo();
        $sql = "select * from {{photo}} where userid = $uid order by rand() limit 0,6";
        $data['photoInfo'] = $photoModel->findAllBySql($sql);

        //标签
        $data['labelInfo'] = $this->GetTags($uid);;

        //文章列表
        $cutSize = 200;        //截取字符数
        $sql = "select b.*,b.id as bid,l.label,u.* from {{user}} u, {{blog}} b,{{label}} l where b.userid = $uid and b.userid = u.id and b.labelid = l.id ";
        $order = " order by b.time desc  ";
        if($id != "all")
            $sql = $sql."and b.labelid = $id ".$order;
        else     
            $sql = $sql.$order;
        
        $criteria=new CDbCriteria();
        $result = Yii::app()->db->createCommand($sql)->query();
        $pages=new CPagination($result->rowCount);
        $pages->pageSize = Yii::app()->params['blogCount'];;
        $pages->applyLimit($criteria);
        $result=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
        $result->bindValue(':offset', $pages->currentPage*$pages->pageSize);
        $result->bindValue(':limit', $pages->pageSize);
        $blogs=$result->queryAll();
        
        /**
         * 结果集处理
         * 1.图片缩放
         * 2.截取文字
         */
        foreach ($blogs as $key=>$b){
            $blogs[$key]['image'] = GetImageFileName($b['image']);
            $blogs[$key]['content'] = Helper::WordTruncate(strip_tags($b['content']),$cutSize,false);
        }

        
        //分两种方式显示
        $data['pages'] = $pages;
        $data['blogs'] = $blogs;
        
        $this->render('index',$data);
        
    }
    
    
    
    //相册一览
    public function actionJustlook($uid)
    {
        
        $this->Myaccess($uid);
        
        $photoModel = new Photo();
        $data['photoInfo']  = $photoModel->findAll('userid=:uid',array(':uid'=>$uid));
        if(empty($data['photoInfo'])) {
            
            $data  = array(
                        'backup'    =>    'index/m',
                        'params'    =>    array('who'=>$uid),
                        'message'    =>    '~啊哟，相册里是空的，主人家没有上传过，回去看看别的吧~',
                    );
                    $this->renderPartial('error',$data);
                    die;
            
        }
        $data['uid'] = $uid;
        $data['url'] = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
        $this->layout = "//layouts/illokit";
        $this->render('picture',$data);
        
    }
    
    
    
    //用户注册
    public function actionRegister()
    {
        
        $registerModel = new Register();
        if(isset($_POST['Register'])) {
            
            $post = $_POST['Register'];
            $registerModel->attributes = $post;
            
            if($registerModel->validate()) {
                
                //验证新用户是否已注册
                
                $registerInfo = $registerModel->findBySql("select username from {{user}} where username = '".$post['username']."' ");
                if($registerInfo['username'] != NULL){    
                    
                    $data  = array(
                        'backup'    =>    'index/register',
                        'params'    =>    array(),
                        'message'    =>    '(⊙v⊙)，运气很背的说，你注册的号比人先注册了。TRY and Make a Change...',
                    );
                    $this->renderPartial('error',$data);
                    die;
                }
                
                $registerModel->password = md5($post['password']);
                if($registerModel->save() == true){

                    //初始化个人网站配置
                    $configModel = new Config();
                    $configModel->userid = $registerModel->attributes['id'];
                    $configModel->iaccess = 0;
                    $configModel->save(false);
                    
                    //初始化个人菜单
                    for($s=1;$s<3;$s++){
                        for($i=1;$i<7;$i++){
                            
                            $name = "自定义".$i;
                            $pid  = 0;
                            $sort = $i;
                            $link = "#";
                            $position = 1;
                            $uid  = $registerModel->attributes['id'];

                            //顶部菜单
                            if($s == 1){
                                
                                if($i == 1) {    //首页
                                    $link = $this->createUrl("/index/m/who/".$uid); 
                                    $name = "主页";
                                    
                                }
                                if($i == 3) {     //下拉菜单
                                    
                                    $sql = "insert into {{menu}} (name,pid,sort,link,position,userid) values('$name',$pid,$sort,'$link',$position,$uid)";
                                    if(Yii::app()->db->createCommand($sql)->execute()) {
                                        
                                        $pid = Yii::app()->db->getLastInsertID();
                                        for($j=1;$j<4;$j++) {
                                            
                                            $name = "下拉菜单".$j;
                                            $sort = $j;
                                            $sql = "insert into {{menu}} (name,pid,sort,link,position,userid) values('$name',$pid,$sort,'$link',$position,$uid)";
                                            Yii::app()->db->createCommand($sql)->execute();
                                        }
                                    }
                                    continue;
                                }
                                if($i == 4) {
                                    $name = "@我吧";
                                    $link = $this->createUrl("/index/contact/uid/".$uid); 
                                }
                                
                                if($i == 5) {
                                    $name = "视频播客".$i;
                                }
                                
                                if($i == 6) {
                                    $name = "我的音乐".$i;
                                }
                            }
                            
                            //顶部菜单
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
                        'backup'    =>    'index/index/register',
                        'message'    =>    '(⊙v⊙)，运气很背的说，你注册的号比你先注册了。',
                    );
                    $this->renderPartial('error',$data);
                }
            }
        }
        
        $data = array('registerModel'=>$registerModel,"backup"=>"index/index",'login'=>'admin/login/index');
        $this->layout = '//layouts/register';
        $this->render('iregister',$data);
    }
    
    
    
    //验证码
    public function actions() 
    {
        
        return array(
            'captcha'    =>    array(
                'class'    =>    'system.web.widgets.captcha.CCaptchaAction',
                'width'    =>    '128',
                'height'=>    '50',
                'backColor'=>0xFFFFFF,
                'foreColor'=>0x212121,
                'padding'=>5,
                'minLength'=>     4,
                'maxLength'=>    4,
                'transparent'=>true,
                
            ),
        );
    }
    
    
    //退出登陆
    public function actionOut()
    {
        
        Yii::app()->user->logout();
        $this->redirect(array('index'));
    }
    
    
}

?>