<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>点滴音乐</title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/musicplayer/css/reset.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/musicplayer/css/style.css" media="screen" type="text/css" />
</head>

<body>
  <div class="music-player">
  <!--<div style="background-image: url(http://i.imgur.com/yqB0erk.jpg);" class="album"></div>-->
  <div class="info">
    <div class="left">
      <a href="javascript:;" class="icon-shuffle"></a>
      <a href="javascript:;" class="icon-heart"></a>
    </div>
    <div class="center">
    <div class="jp-playlist">
      <ul>
        <li></li>
      </ul>
    </div>

    </div>
    <div class="right">
      <a href="javascript:;" class="icon-repeat"></a>
      <a href="javascript:;" class="icon-share"></a>
    </div>
    <div class="progress jp-seek-bar">
      <span class="jp-play-bar" style="width: 0%"></span>
    </div>
  </div>

  <div class="controls">
    <div class="current jp-current-time">00:00</div>
    <div class="play-controls">
      <a href="javascript:;" class="icon-previous jp-previous" title="previous"></a>
      <a href="javascript:;" class="icon-play jp-play" title="play"></a>
      <a href="javascript:;" class="icon-pause jp-pause" title="pause"></a>
      <a href="javascript:;" class="icon-next jp-next" title="next"></a>
    </div>
    <div class="volume-level jp-volume-bar">
      <span class="jp-volume-bar-value" style="width: 0%"></span>
      <a href="javascript:;" class="icon-volume-up jp-volume-max" title="max volume"></a>
      <a href="javascript:;" class="icon-volume-down jp-mute" title="mute"></a>
    </div>
  </div>
  <div id="jquery_jplayer" class="jp-jplayer"></div>

</div>



<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/musicplayer/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/musicplayer/js/jquery.jplayer.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/musicplayer/js/jplayer.playlist.min.js"></script>
<script>
$(document).ready(function(){
  var output = '<?php echo json_encode($musiclist); ?>';
  output = eval("("+output+")");
  var url = "<?php echo $url; ?>";
  var playlist = new Array();
  
  for(var key in output) {
	  var music = new Object();
	  music.poster = "http://7fvctr.com1.z0.glb.clouddn.com/2100237760.jpg";
	  music.artist = "Summer SouthSide";
	  music.title = output[key].name;
	  music.mp3 = url+output[key].song;
	  playlist.push(music);
  }
  
  console.log(playlist);
  
  var cssSelector = {
    jPlayer: "#jquery_jplayer",
    cssSelectorAncestor: ".music-player"
  };
  
  var options = {
    swfPath: "Jplayer.swf",
    supplied: "ogv, m4v, oga, mp3"
  };
  
  var myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);
  
});
</script>



</body>

</html>