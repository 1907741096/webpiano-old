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
			<div class="class_name">添加管理员 -></div>
		</div>
		<div  class="addform">
			<form id="form">
				<input type="text" name="username" placeholder="username" class="form_text" value="<?php echo ($adminbyid["username"]); ?>"><br>
				<input type="password" name="password" placeholder="password" class="form_text"><br>
				<input type="password" name="password2" placeholder="confirm password" class="form_text"><br>
				<input type="text" name="name" placeholder="name" class="form_text" value="<?php echo ($adminbyid["name"]); ?>"><br>
				<input type="text" name="email" placeholder="email" class="form_text" value="<?php echo ($adminbyid["email"]); ?>"><br>
				<span>
					<input  class="form_radio" type="radio" name="status" value="1" <?php if($adminbyid['status'] == 1): ?>checked<?php endif; ?>>开启
					<input  class="form_radio" type="radio" name="status" value="0" <?php if($adminbyid['status'] == 0): ?>checked<?php endif; ?>>关闭
				</span><br>
				<input type="hidden" name="admin_id" value="<?php echo ($adminbyid["admin_id"]); ?>">
				<input class="form_button" type="button" id="submit" value="submit">
			</form>
		</div>
	</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js?v=318"></script>
<script type="text/javascript">
	var SCOPE={
		'url':'admin.php?c=admin&a=add',
		'jump_url':'admin.php?c=admin'
	}
</script>
</body>
</html>