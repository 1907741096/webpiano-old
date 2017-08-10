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
	<div class="opern_mid">
		<div class="operninfo_name"><?php echo ($opern["name"]); ?></div>
		<img src="<?php echo ($opern["thumb"]); ?>" class="operninfo_img">
		<div class="operninfo_collect">
			<?php if(ifcollect($opern['opern_id'],$collects) == 1): ?><div class="opern_collect" id="collect" attr-id="<?php echo ($opern["opern_id"]); ?>">收藏</div>
			<?php else: ?>
				<div class="opern_ysc">已收藏</div><?php endif; ?>
			<div class="opern_count">收藏数:<?php echo ($opern["count"]); ?></div>
		</div>
	</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js"></script>
<script type="text/javascript">
	var SCOPE={
		'collect_url':'index.php?c=collect&a=add'
	}
</script>
</body>