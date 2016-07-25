<?php

    /**
     * 自定义公用函数
     */    

    //打印数组
    function p($var){
        
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        
    }
    
    
    //图片文件类型检查函数
    function ImageTypeCheck($filename,$filesize){
        
        $extend = pathinfo($filename);
        $extend = strtolower($extend['extension']);
        
        $allowType = Yii::app()->params['imageType'];
        $allowType = array_filter(explode(',', $allowType));
        
        if($filesize < Yii::app()->params['imageSize'] && in_array($extend, $allowType))
            return true;
        else 
            return false;
        
    }
    
    //音频文件类型检查函数
    function MusicTypeCheck($filename,$filesize){
        
        $extend = pathinfo($filename);
        $extend = strtolower($extend['extension']);
        
        $allowType = Yii::app()->params['songType'];
        $allowType = array_filter(explode(',', $allowType));
        
        if($filesize < Yii::app()->params['songSize'] && in_array($extend, $allowType))
            return true;
        else 
            return false;
        
    }
    
    //视频文件类型检查函数
    function MvTypeCheck($filename,$filesize){
        
        $extend = pathinfo($filename);
        $extend = strtolower($extend['extension']);
        
        $allowType = Yii::app()->params['mvType'];
        $allowType = array_filter(explode(',', $allowType));
        
        if($filesize < Yii::app()->params['mvSize'] && in_array($extend, $allowType))
            return true;
        else 
            return false;
        
    }
    
    //获取文件后缀名
    function GetFileExtension($filename){
        
        $extend = pathinfo($filename);
        $extend = strtolower($extend['extension']);
        if(!empty($extend)){
            return $extend;
        }else{
            return "";
        }
    }
    
    
    //解析图片url中的文件名
    function GetImageFileName($imgs){
        $images = array();
        $imgs = array_filter(explode("@", $imgs));
        
        $url = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";

        foreach ($imgs as $key=> $i){
            $images[$key] = str_replace($url, "", $i);
        }

        return $images;
    }
    
    
    //七牛接口  图片高级处理  首页小图缩放
    function GetSpecialImage($imgs){
        $images = array();
        $imgs = array_filter(explode("@", $imgs));
        
        //缩略格式：http://qiniuphotos.qiniudn.com/gogopher.jpg?imageMogr2/thumbnail/200x300!
        foreach ($imgs as $key=> $i){
            $images[$key] = $i."?".'imageMogr2/thumbnail/'.Yii::app()->params['smallImageWidth'].'x'.Yii::app()->params['smallImageHeight'].'!';
            
        }
        return $images;
        
    }
    
    //七牛接口  图片高级处理   首页大图缩放
    function GetSpecialBigImage($imgs){
        $images = array();
        $imgs = array_filter(explode("@", $imgs));
        
        //缩略格式：http://qiniuphotos.qiniudn.com/gogopher.jpg?imageMogr2/thumbnail/200x300!
        foreach ($imgs as $key=> $i){
            $images[$key] = $i."?".'imageMogr2/thumbnail/'.Yii::app()->params['bigImageWidth'].'x'.Yii::app()->params['bigImageHeight'].'!';
            
        }
        return $images;
        
    }
    
    
    //生成音乐列表存入用户xml中
    function Createmusiclist(){
        $uid = Yii::app()->session['uid'];
        $songModel = new Song();
        $sql = "select * from {{song}} where userid = $uid order by sort asc ";
        $musiclist = $songModel->findAllBySql($sql);
        
        $path = "./music/";
        if(!is_dir($path))
            @mkdir($path,0777);
        $path = $path.Yii::app()->session['uid']."/";
        if(!is_dir($path))
            @mkdir($path,0777);
            
        $file = "mylist.php";
            
        /*
         * 输出格式
         */
//        <player>
//          <playlist>
//            <track>
//              <file>http://wansun-iblog.qiniudn.com/139920474153695.mp3</file>
//              <title>trouble maker</title>
//              <artist>金泫雅</artist>
//              <album>-</album>
//            </track>
//          </playlist>
//        </player>
                
        $content = "<player><playlist>";
        $url = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
        if($musiclist != NULL){
            
            foreach ($musiclist as $key=>$m){
                $content .= "<track>
                                  <file>$url$m->song</file>
                                  <title>$m->name</title>
                                  <artist></artist>
                                  <album>-</album>
                            </track>";
            }
        }
        $content .= "</player></playlist>";
        file_put_contents($path.$file, $content);
        
        return 0;
        
    }
        
        
    /*
     * 文字截断 begin
     */
    function smartDetectUTF8($string)
    {
        static $result = array();
    
        if(! array_key_exists($key = md5($string), $result))
        {
            $utf8 = "
                /^(?:
                    [\x09\x0A\x0D\x20-\x7E]                            # ASCII
                    | [\xC2-\xDF][\x80-\xBF]                             # non-overlong 2-byte
                    | \xE0[\xA0-\xBF][\x80-\xBF]                       # excluding overlongs
                    | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}           # straight 3-byte
                    | \xED[\x80-\x9F][\x80-\xBF]                      # excluding surrogates
                    | \xF0[\x90-\xBF][\x80-\xBF]{2}                 # planes 1-3
                    | [\xF1-\xF3][\x80-\xBF]{3}                          # planes 4-15
                    | \xF4[\x80-\x8F][\x80-\xBF]{2}                  # plane 16
                )+$/xs
            ";
    
            $result[$key] = preg_match(trim($utf8), $string);
        }
    
        return $result[$key];
    }
    
    function smartStrlen($string)
    {
        $result = 0;
    
        $number = smartDetectUTF8($string) ? 3 : 2;
    
        for($i = 0; $i < strlen($string); $i += $bytes)
        {
            $bytes = ord(substr($string, $i, 1)) > 127 ? $number : 1;
    
            $result += $bytes > 1 ? 1.0 : 0.5;
        }
    
        return $result;
    }
    
    function smartSubstr($string, $start, $length = null)
    {
        $result = '';
    
        $number = smartDetectUTF8($string) ? 3 : 2;
    
        if($start < 0)
        {
            $start = max(smartStrlen($string) + $start, 0);
        }
    
        for($i = 0; $i < strlen($string); $i += $bytes)
        {
            if($start <= 0)
            {
                break;
            }
    
            $bytes = ord(substr($string, $i, 1)) > 127 ? $number : 1;
    
            $start -= $bytes > 1 ? 1.0 : 0.5;
        }
    
        if(is_null($length))
        {
            $result = substr($string, $i);
        }
        else
        {
            for($j = $i; $j < strlen($string); $j += $bytes)
            {
                if($length <= 0)
                {
                    break;
                }
    
                if(($bytes = ord(substr($string, $j, 1)) > 127 ? $number : 1) > 1)
                {
                    if($length < 1.0)
                    {
                        break;
                    }
    
                    $result .= substr($string, $j, $bytes);
                    $length -= 1.0;
                }
                else
                {
                    $result .= substr($string, $j, 1);
                    $length -= 0.5;
                }
            }
        }
    
        return $result;
    }
    
    function WordTruncate($string, $length = 80, $etc = '',$break_words = FALSE, $middle = FALSE)
    {
        if ($length == 0)
            return '';
    
        if (smartStrlen($string) > $length) {
            $length -= smartStrlen($etc);
            if (!$break_words && !$middle) {
                $string = preg_replace('/\s+?(\S+)?$/', '', smartSubstr($string, 0, $length+1));
            }
            if(!$middle) {
                return smartSubstr($string, 0, $length).$etc;
            } else {
                return smartSubstr($string, 0, $length/2) . $etc . smartSubstr($string, -$length/2);
            }
        } else {
            return $string;
        }
    }
    /*
     * 文字截断 end
     */
    
    
    //判断多文件上传是否为空
    function CheckUploadFiles($files){
        

        $flag = 0;
        foreach ($files['name'] as $key=>$f){
            if(!empty($f)){
                $flag = 1;
                break;
            }
        }
        return $flag;
    }
    
    function is_mobile_request(){

        $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
        $mobile_browser = '0';    
        if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))    $mobile_browser++;    
        if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))    $mobile_browser++;    
        if(isset($_SERVER['HTTP_X_WAP_PROFILE']))    $mobile_browser++;    
        if(isset($_SERVER['HTTP_PROFILE']))    $mobile_browser++;    
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
        $mobile_agents = array('w3c','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');    
        if(in_array($mobile_ua, $mobile_agents))     $mobile_browser++;
        if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)     $mobile_browser++;
        // Pre-final check to reset everything if the user is on Windows    
        if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)     $mobile_browser=0;
        // But WP7 is also Windows, with a slightly different characteristic    
        if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)     $mobile_browser++;
        if($mobile_browser>0){
            return true;
        } else {
            return false; 
        }
    }