<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台</title>
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/admin.css">
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/page.css">
	<script src="/WebPiano/Public/js/jquery-3.1.1.min.js"></script>
	<script src="/WebPiano/Public/js/layer/layer.js"></script>
	<script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>

<body>
	<div class="main">
		<div class="admin_class">
			<div class="class_name">后台首页 -></div>
		</div>
		<div class="admin_count">用户总数 : <?php echo ($usercount); ?></div>
		<div class="admin_count">帖子总数 : <?php echo ($newscount); ?></div>
		<div class="admin_count">曲谱总数 : <?php echo ($operncount); ?></div>
		<div class="admin_count">音乐总数 : <?php echo ($musiccount); ?></div>
	</div>
</body>
</html>