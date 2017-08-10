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
			<div class="class_name">添加音乐 -></div>
		</div>
		<div  class="addform">
			<form id="form">
				<input type="text" name="name" placeholder="name" class="form_text" value="<?php echo ($musicbyid["name"]); ?>"><br>
				<input type="text" name="author" placeholder="author" class="form_text" value="<?php echo ($musicbyid["author"]); ?>"><br>
				<input id="music_upload" type="file" multiple="true" >
		        <input id="file_upload_image" name="address" type="hidden" multiple="true" value="<?php echo ($musicbyid["address"]); ?>"><br>
				<span>
					<input  class="form_radio" type="radio" name="status" value="1" <?php if($musicbyid['status'] == 1): ?>checked<?php endif; ?>>开启
					<input  class="form_radio" type="radio" name="status" value="0" <?php if($musicbyid['status'] == 0): ?>checked<?php endif; ?>>关闭
				</span><br>
				<input type="hidden" name="music_id" value="<?php echo ($musicbyid["music_id"]); ?>">
				<input class="form_button" type="button" id="submit" value="submit">
			</form>
		</div>
	</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js"></script>
<script type="text/javascript" src="/WebPiano/Public/js/party/jquery.uploadify.js"></script>
<script type="text/javascript" src="/WebPiano/Public/js/music.js"></script>
<script type="text/javascript">
	var SCOPE={
		'url':'admin.php?c=music&a=add',
		'jump_url':'admin.php?c=music',
		'ajax_upload_image_url':'admin.php?c=music&a=ajaxuploadmusic',
		'ajax_upload_swf':'/WebPiano/Public/js/party/uploadify.swf'
	}
</script>
</body>
</html>