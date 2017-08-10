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
	<div class="news_content">
		<div class="news_content_top">
			<div class="news_content_top_title">最新更新</div>
			<div class="news_content_top_select">
				<form action="index.php" method="get">
					<input type="hidden" name="c" value="news">
					<input type="hidden" name="a" value="main">
					<div class="search">
						<input type="text" name="title" id="select" placeholder="帖子搜索" value="<?php echo ($title); ?>">
						<button type="submit" id="wp-select"><img src="/WebPiano/Public/image/icon/search.png" width="20px"></button>
					</div>
				</form>
			</div>
		</div>
		<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><div class="news_content_bottom">
				<div class="news_content_title">
					<?php if($new['fine'] == 1): ?><span id="fine">精</span><?php endif; ?>
					<a href="index.php?c=news&a=info&id=<?php echo ($new["news_id"]); ?>" target="_blank"><?php echo ($new["title"]); ?></a>
					<div class="time"><img src="/WebPiano/Public/image/icon/clock.png" height="18px"><div><?php echo (date("m-d H:i",$new["create_time"])); ?></div></div>
				</div>
				<div class="news_content_content">
					<div class="news_content_img">
						<img src="<?php echo ($new["thumb"]); ?>">
					</div>
					<div class="news_content_right">
						<div class="news_content_right_content"><?php echo (getcontent($new["content"])); ?></div>
						<div class="news_content_info"><img src="/WebPiano/Public/image/icon/user.png" height="16px"><?php echo ($new["author"]); ?></div>
						<div class="news_content_comment"><img src="/WebPiano/Public/image/icon/comments.png" height="16px"><?php echo ($new["comment"]); ?></div>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="green-black"><?php echo ($pageRes); ?></div>
	</div>
</body>