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
	<div class="top">
	<a class="top_left" href="admin.php">Web钢琴后台管理系统</a>
	<a class="top_right" href="admin.php?c=login&a=loginout">退出登录</a>
	<a class="top_right" href="index.php">回到首页</a>
</div>
	<section>
		<div class="section_left">
			<div>
				<li>+ 用户管理</li>
				<ul>
					<li><a href="admin.php?c=user" target="mainFrame">用户信息</a></li>
					<li><a href="admin.php?c=user&a=add" target="mainFrame">添加用户</a></li>
				</ul>
				<li>+ 论坛管理</li>
				<ul>
					<li><a href="admin.php?c=news" target="mainFrame">帖子信息</a></li>
					<li><a href="admin.php?c=news&a=add" target="mainFrame">添加帖子</a></li>
				</ul>
				<li>+ 评论管理</li>
				<ul>
					<li><a href="admin.php?c=comment" target="mainFrame">评论信息</a></li>
				</ul>
				<li>+ 回复管理</li>
				<ul>
					<li><a href="admin.php?c=reply" target="mainFrame">回复信息</a></li>
				</ul>
				<li>+ 曲谱管理</li>
				<ul>
					<li><a href="admin.php?c=opern" target="mainFrame">曲谱信息</a></li>
					<li><a href="admin.php?c=opern&a=add" target="mainFrame">添加曲谱</a></li>
				</ul>
				<li>+ 收藏管理</li>
				<ul>
					<li><a href="admin.php?c=collect" target="mainFrame">收藏信息</a></li>
				</ul>
				<li>+ 音乐管理</li>
				<ul>
					<li><a href="admin.php?c=music" target="mainFrame">音乐信息</a></li>
					<li><a href="admin.php?c=music&a=add" target="mainFrame">添加音乐</a></li>
				</ul>
				<li>+ 管理员管理</li>
				<ul>
					<li><a href="admin.php?c=admin" target="mainFrame">管理员信息</a></li>
					<li><a href="admin.php?c=admin&a=add" target="mainFrame">添加管理员</a></li>
				</ul>
			</div>
		</div>
		<div class="section_right">
			<iframe src="admin.php?c=index&a=main" frameborder="0" name="mainFrame" width="100%" height="100%"></iframe>
		</div>
	</section>
</body>
</html>