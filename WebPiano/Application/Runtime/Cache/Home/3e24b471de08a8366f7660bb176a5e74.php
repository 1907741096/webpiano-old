<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--	又看源代码
                       ::
                      :;J7, :,                        ::;7:
                      ,ivYi, ,                       ;LLLFS:
                      :iv7Yi                       :7ri;j5PL
                     ,:ivYLvr                    ,ivrrirrY2X,
                     :;r@Wwz.7r:                :ivu@kexianli.
                    :iL7::,:::iiirii:ii;::::,,irvF7rvvLujL7ur
                   ri::,:,::i:iiiiiii:i:irrv177JX7rYXqZEkvv17
                ;i:, , ::::iirrririi:i:::iiir2XXvii;L8OGJr71i
              :,, ,,:   ,::ir@mingyi.irii:i:::j1jri7ZBOS7ivv,
                 ,::,    ::rv77iiiriii:iii:i::,rvLq@huhao.Li
             ,,      ,, ,:ir7ir::,:::i;ir:::i:i::rSGGYri712:
           :::  ,v7r:: ::rrv77:, ,, ,:i7rrii:::::, ir7ri7Lri
          ,     2OBBOi,iiir;r::        ,irriiii::,, ,iv7Luur:
        ,,     i78MBBi,:,:::,:,  :7FSL: ,iriii:::i::,,:rLqXv::
        :      iuMMP: :,:::,:ii;2GY7OBB0viiii:i:iii:i:::iJqL;::
       ,     ::::i   ,,,,, ::LuBBu BBBBBErii:i:i:i:i:i:i:r77ii
      ,       :       , ,,:::rruBZ1MBBqi, :,,,:::,::::::iiriri:
     ,               ,,,,::::i:  @arqiao.       ,:,, ,:::ii;i7:
    :,       rjujLYLi   ,,:::::,:::::::::,,   ,:i,:,,,,,::i:iii
    ::      BBBBBBBBB0,    ,,::: , ,:::::: ,      ,,,, ,,:::::::
    i,  ,  ,8BMMBBBBBBi     ,,:,,     ,,, , ,   , , , :,::ii::i::
    :      iZMOMOMBBM2::::::::::,,,,     ,,,,,,:,,,::::i:irr:i:::,
    i   ,,:;u0MBMOG1L:::i::::::  ,,,::,   ,,, ::::::i:i:iirii:i:i:
    :    ,iuUuuXUkFu7i:iii:i:::, :,:,: ::::::::i:i:::::iirr7iiri::
    :     :rk@Yizero.i:::::, ,:ii:::::::i:::::i::,::::iirrriiiri::,
     :      5BMBBBBBBSr:,::rv2kuii:::iii::,:i:,, , ,,:,:i@petermu.,
          , :r50EZ8MBBBBGOBBBZP7::::i::,:::::,: :,:,::i;rrririiii::
              :jujYY7LS0ujJL7r::,::i::,::::::::::::::iirirrrrrrr:ii:
           ,:  :@kevensun.:,:,,,::::i:i:::::,,::::::iir;ii;7v77;ii;i,
           ,,,     ,,:,::::::i:iiiii:i::::,, ::::iiiir@xingjief.r;7:i,
        , , ,,,:,,::::::::iiiiiiiiii:,:,:::::::::iiir;ri7vL77rrirri::
         :,, , ::::::::i:::i:::i:i::,,,,,:,::i:i:::iir;@Secbone.ii:::
		 
-->
<html>
<head>
	<title>WebPiano</title>
  <link rel="icon" href="/WebPiano/Public/image/icon/piano.png" type="image/jpg" sizes="16*16">
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/style.css">
  <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/page.css">
  <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/music.css">
	<link id="colorstyle" rel="stylesheet" type="text/css" href="/WebPiano/Public/css/<?php echo ($color); ?>.css">
	<script src="/WebPiano/Public/js/jquery.js"></script>
	<script src="/WebPiano/Public/js/layer/layer.js"></script>
	<script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>

<body>
	<div class="background"></div>
<header>
	<div class="top">
		<a class="logo" href="/WebPiano">WebPiano</a>
		<a href="/WebPiano/index.php?c=news" class="top-left">论坛</a>
		<a href="/WebPiano/index.php?c=opern" class="top-left">曲谱站</a>
		<a href="/WebPiano/index.php?c=info" class="top-left">个人中心</a>
		<div class="top-login">
			<img>
			<?php if($isuser == 1): ?><a href="index.php?c=login&a=loginout">LoginOut</a>
			<?php else: ?>
				<a onclick="login()">Login</a>
				<!--/ <a onclick="reg()">Register</a>--><?php endif; ?>
		</div>
	</div>
	<script type="text/javascript">
		function login(){
			layer.open({
				type: 2,
				area: ['400px', '620px'],
				fixed: false, //不固定
				maxmin: true,
				content: '/WebPiano/index.php?c=login'
			});
		}
		function reg(){
			layer.open({
				type: 2,
				area: ['400px', '620px'],
				fixed: false, //不固定
				maxmin: true,
				content: '/WebPiano/index.php?c=login&a=reg'
			});
		}
	</script>
</header>
	<div class="news">
		<div class="news_left">
			<div class="news_top">
				<div class="stick">置顶帖</div>
				<?php if(is_array($newsstick)): $i = 0; $__LIST__ = $newsstick;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newstick): $mod = ($i % 2 );++$i;?><a class="news_stick" href="index.php?c=news&a=info&id=<?php echo ($newstick["news_id"]); ?>">
						<div class="stick_title"><span>置顶</span><?php echo (gettitle($newstick["title"])); ?></div>
						<div class="stick_content"><?php echo (getstickcontent($newstick["content"])); ?></div>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<iframe src="index.php?c=news&a=main" frameborder="0" name="mainFrame" width="100%" height="1718px"></iframe>
			<div class="news_addform">
				<div class="news_fbxt"><img src="/WebPiano/Public/image/icon/edit.png" width="20">发表新帖</div>
				<form id="form">
					<input type="text" name="title" placeholder="帖子标题" class="form_text" value=""><br>
					<input id="file_upload"  type="file" multiple="true" >
					<img style="display:none;" id="upload_org_code_img" src="" width="170" height="100">
					<input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="">
					<textarea class="" id="editor" name="content" rows="20" style="width: 100%"></textarea>
					<input class="news_form_button" type="button" id="submit" value="发表">
				</form>
			</div>
	</div>
	<div class="news_right">
	<div class="music">			
		<div class="music-player" style="width: 80%; margin: 0 auto;">
		  <div class="info">
		    <div class="left"> <a href="javascript:;" class="icon-shuffle"></a> <a href="javascript:;" class="icon-heart"></a> </div>
		    <div class="center" style="">
		      <div class="jp-playlist">
		        <ul style="padding: 0;margin:0;">
		          <li></li>
		        </ul>
		      </div>
		    </div>
		    <div class="right"> <a href="javascript:;" class="icon-repeat"></a> <a href="javascript:;" class="icon-share"></a> </div>
		    <div class="progress jp-seek-bar"> <span class="jp-play-bar" style="width: 0%"></span> </div>
		  </div>
		  <div class="controls">
		    <div class="current jp-current-time">00:00</div>
		    <div class="play-controls"> 
		    	<a href="javascript:;" class="icon-previous jp-previous" title="previous" style="margin:20px;"></a> 
		        <a href="javascript:;" class="icon-play jp-play" title="play" style="margin:20px;"></a> 
		        <a href="javascript:;" class="icon-pause jp-pause" title="pause" style="margin:20px;"></a> 
		        <a href="javascript:;" class="icon-next jp-next" title="next" style="margin:20px;"></a> 
		     </div>
		    <div class="volume-level jp-volume-bar"> 
		    	<span class="jp-volume-bar-value" style="width: 0%"></span> 
		        	<a href="javascript:;" class="icon-volume-up jp-volume-max" title="max volume"></a> 
		            <a href="javascript:;" class="icon-volume-down jp-mute" title="mute"></a> 
		    </div>
		  </div>
		<div id="jquery_jplayer" class="jp-jplayer"></div>
		</div>
	</div>
	<script type="text/javascript" src="/WebPiano/Public/js/music/music.js?"></script>
	<script src="/WebPiano/Public/js/music/jquery.min.js"></script>
	<script src='/WebPiano/Public/js/music/jquery.jplayer.min.js'></script>
	<script src='/WebPiano/Public/js/music/jplayer.playlist.min.js'></script>
</div>
</div>
<div class="news_bottom"></div>
<script src="/WebPiano/Public/js/common.js?v=328"></script>
<script src="/WebPiano/Public/js/party/jquery.uploadify.js"></script>
<script src="/WebPiano/Public/js/image.js"></script>
<script src="/WebPiano/Public/js/kindeditor/kindeditor-all.js"></script>
<script>
  // 6.2
  KindEditor.ready(function(K) {
  	window.editor = K.create('#editor',{
  		uploadJson : 'index.php?c=image&a=kindupload',
      afterBlur : function(){this.sync();}, //
  });
  });
  var SCOPE={
		'save_url':'index.php?c=news&a=add',
		'jump_url':'index.php?c=news',
		'ajax_upload_image_url':'index.php?c=image&a=ajaxuploadimage',
		'ajax_upload_swf':'/WebPiano/Public/js/party/uploadify.swf'
	}
</script>
</body>
</html>