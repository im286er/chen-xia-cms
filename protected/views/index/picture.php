<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>高清图册</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/piccontext.css" rel="stylesheet" type="text/css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/piccontent.min.js" type="text/javascript"></script>
</head>
<body>
<!--主体内容-->
<div class="main"> 
  <!--弹出层开始-->
  <!--播放到第一张图的提示-->
  <div class="firsttop">
    <div class="firsttop_left"></div>
    <div class="firsttop_right">
      <div class="close2"> <a class="closebtn1" title="关闭" href="javascript:void(0)"></a> </div>
      <div class="replay">
        <p> <a class="replaybtn1" href="javascript:;" style="font-family:'幼圆';">重新播放</a> </p>
      </div>
      <div class="returnbtn"> <a href="<?php echo $this->createUrl("index/my",array('uid'=>$uid));?>" style="font-family:'幼圆';">返回主页</a> </div>
    </div>
  </div>
  <!--播放到最后一张图的提示-->
  <div class="endtop">
    <div class="firsttop_left"></div>
    <div class="firsttop_right">
      <div class="close2"> <a class="closebtn2" title="关闭" href="javascript:void(0)"></a> </div>
      <div class="replay">
        <p> <a class="replaybtn2" href="javascript:;" style="font-family:'幼圆';">重新播放</a> </p>
      </div>
      <div class="returnbtn"> <a href="<?php echo $this->createUrl("index/my",array('uid'=>$uid));?>" style="font-family:'幼圆';">返回主页</a> </div>
    </div>
  </div>
  <!--弹出层结束--> 
  <!--图片特效内容开始-->
  <div class="piccontext" >
   <!-- 
    <div class="source">
      <div style="margin-left:40%;font-family:'幼圆';font-size:35px;font-weight:bold;">让心灵去旅行</div>
    </div>
    -->
    <!--大图展示-->
    <div class="picshow">
      <div class="picshowtop">
          <a href="#"><img src="" alt="" id="pic1" curindex="0" /></a>
          <a id="preArrow" href="javascript:void(0)" class="contextDiv" title="上一张"><span id="preArrow_A"></span></a>
          <a id="nextArrow" href="javascript:void(0)" class="contextDiv" title="下一张"><span id="nextArrow_A"></span></a>
      </div>
      <div class="picshowlist"> 
        <!--上一条图库-->
        <div class="picshowlist_mid">
          <div class="picmidmid" style="display:none;">
            <ul>
            <?php foreach ($photoInfo as $key=> $p): ?>
            <li> <a href="javascript:void(0);"><img src="<?php echo $url.$p->picture;?>" alt="" bigimg="<?php echo $url.$p->picture;?>"  /></a></li>
            <?php endforeach; ?>
            <!-- 原型
              <li> <a href="javascript:void(0);"><img src="images/1.jpg" alt="" bigimg="images/1.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/2.jpg" alt="" bigimg="images/2.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/3.jpg" alt="" bigimg="images/3.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/4.jpg" alt="" bigimg="images/4.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/5.jpg" alt="" bigimg="images/5.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/6.jpg" alt="" bigimg="images/6.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/7.jpg" alt="" bigimg="images/7.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/8.jpg" alt="" bigimg="images/8.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/9.jpg" alt="" bigimg="images/9.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/10.jpg" alt="" bigimg="images/10.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/11.jpg" alt="" bigimg="images/11.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/12.jpg" alt="" bigimg="images/12.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/12.jpg" alt="" bigimg="images/13.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/12.jpg" alt="" bigimg="images/14.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/12.jpg" alt="" bigimg="images/15.jpg"  /></a></li>
              <li> <a href="javascript:void(0);"><img src="images/12.jpg" alt="" bigimg="images/16.jpg"  /></a></li>
             -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
</body>
</html>