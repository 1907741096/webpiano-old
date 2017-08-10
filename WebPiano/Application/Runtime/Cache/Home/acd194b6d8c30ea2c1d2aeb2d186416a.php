<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>WebPiano</title>
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/style.css">
	<script src="/WebPiano/Public/js/jquery-3.1.1.min.js"></script>
	<script src="/WebPiano/Public/js/layer/layer.js"></script>
	<script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>
<body>
	<div class="info_button">
		<a href="index.php?c=info&a=main" class="info_button_true">个人资料</a>
		<a href="index.php?c=info&a=news">发帖纪录</a>
		<a href="index.php?c=info&a=comment">评论纪录</a>
	</div>
	<div class="info_info">
		<form id="form" class="info_form">
			<input id="file_upload"  type="file" multiple="true" >
		    <img <?php if($userbyid['face'] == ''): ?>style="display:none;"<?php endif; ?> id="upload_org_code_img" src="<?php echo ($userbyid["face"]); ?>" width="150" height="150">
		    <input id="file_upload_image" name="face" type="hidden" multiple="true" value="<?php echo ($userbyid["face"]); ?>">
			<input type="text" name="name" placeholder="昵称" class="form_text" value="<?php echo ($userbyid["name"]); ?>"><br>
			<input type="text" name="email" placeholder="邮箱" class="form_text" value="<?php echo ($userbyid["email"]); ?>"><br>
			<input type="hidden" name="user_id" value="<?php echo ($userbyid["user_id"]); ?>">
			<input class="form_button" type="button" id="submit" value="修改资料">
		</form>
	</div>
<script src="/WebPiano/Public/js/common.js?v=328"></script>
<script src="/WebPiano/Public/js/party/jquery.uploadify.js"></script>
<script src="/WebPiano/Public/js/image.js"></script>
<script>
  var SCOPE={
		'save_url':'index.php?c=info&a=edit',
		'jump_url':'parent',
		'ajax_upload_image_url':'index.php?c=image&a=ajaxuploadimage',
		'ajax_upload_swf':'/WebPiano/Public/js/party/uploadify.swf'
	}
</script>
</body>