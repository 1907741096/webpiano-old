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
	<canvas id="myCanvas" style="position: fixed;z-index: -1;"></canvas>
	<form class="adminform">
	<div>Admin Login</div>
	<input type="text" name="username" class="username" placeholder="username" value="admin"><br>
	<input type="password" name="password" class="password" placeholder="password" value="admin"><br>
	<input type="button" name="submit" class="submit" value="login">
	</form>
<script type="text/javascript" src="/WebPiano/Public/js/login.js?v=318"></script>
<script type="text/javascript" src="/WebPiano/Public/js/canvas.js"></script>
</body>
</html>