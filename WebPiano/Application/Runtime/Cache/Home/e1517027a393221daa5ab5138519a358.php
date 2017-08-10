<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>WebPiano</title>
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/style.css">
  	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/page.css">
	<script src="/WebPiano/Public/js/jquery-3.1.1.min.js"></script>
	<script src="/WebPiano/Public/js/layer/layer.js"></script>
	<script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>
<body>
	<div class="news_content_top_select" style="width: 100%;">
		<div class="opern_order"><a href="index.php?c=opern&a=orderbycount">热门排序↓</a></div>
		<div class="opern_order"><a href="index.php?c=opern&a=orderbytime">时间排序↓</a></div>
		<form action="index.php" method="get" style="float: right;margin-right: 50px;">
			<input type="hidden" name="c" value="opern">
			<input type="hidden" name="a" value="orderbycount">
			<div class="search">
				<input type="text" name="name" id="select" placeholder="曲谱搜索" value="<?php echo ($name); ?>">
				<button type="submit" id="wp-select" style="height: 30px;"><img src="/WebPiano/Public/image/icon/search.png" width="20px"></button>
			</div>
		</form>
	</div>
	<?php if(is_array($operns)): $i = 0; $__LIST__ = $operns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$opern): $mod = ($i % 2 );++$i;?><div class="opern_one">
			<div class="opern_mid" style="width: 180px;height: 260px;margin: 20px auto;">
				<a href="index.php?c=opern&a=info&id=<?php echo ($opern["opern_id"]); ?>">
					<div class="opern_name"><?php echo (gettitle($opern["name"])); ?></div>
					<img src="<?php echo ($opern["thumb"]); ?>" width="100%" height="200px">
				</a>
				<?php if(ifcollect($opern['opern_id'],$collects) == 1): ?><div class="opern_collect" id="collect" attr-id="<?php echo ($opern["opern_id"]); ?>">收藏</div>
				<?php else: ?>
					<div class="opern_ysc">已收藏</div><?php endif; ?>
				<div class="opern_count">收藏数:<?php echo ($opern["count"]); ?></div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<div class="green-black" style="clear: both;margin-top: 30px;"><?php echo ($pageRes); ?></div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js"></script>
<script type="text/javascript">
	var SCOPE={
		'collect_url':'index.php?c=collect&a=add'
	}
</script>
</body>