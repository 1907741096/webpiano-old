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
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/style.css">
  <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/page.css">
  <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/music.css">
	<link id="colorstyle" rel="stylesheet" type="text/css" href="/WebPiano/Public/css/<?php echo ($color); ?>.css">
	<script src="/WebPiano/Public/js/jquery-3.1.1.min.js"></script>
	<script src="/WebPiano/Public/js/layer/layer.js"></script>
	<script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>

<body>
<div class="background"></div>
<header>
	<div class="top">
		<a class="logo" href="/WebPiano">WebPiano</a>
		<a href="/WebPiano/index.php?c=news" class="top-left">论坛</a>
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
	<section class="error">
		<h1 style="color:red"><?php echo ($message); ?></h1>
		<h3 id="location" >系统将在<span style="color:red">3</span>秒后自动跳转到首页</h3>
	</section>
<script type="text/javascript">
  var url = "index.php";
  var time = 3;
  setInterval("refer()",1000);
  function refer() {
	if(time==0) {
	  location.href=url;
	}
	$("#location span").html(time);
	time--;
  }
</script>
</body>