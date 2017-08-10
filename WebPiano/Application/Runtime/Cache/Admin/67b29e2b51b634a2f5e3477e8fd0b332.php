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
			<div class="class_name">添加曲谱 -></div>
		</div>
		<div  class="news_addform">
			<form id="form">
				<input type="text" name="name" placeholder="name" class="form_text" value="<?php echo ($opernbyid["name"]); ?>"><br>
				<input id="file_upload"  type="file" multiple="true" >
		        <img <?php if($opernbyid['thumb'] == ''): ?>style="display:none;"<?php endif; ?> id="upload_org_code_img" src="<?php echo ($opernbyid["thumb"]); ?>" width="150" height="150">
		        <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="<?php echo ($opernbyid["thumb"]); ?>"><br>
		        <label>状态:</label><span>
				<input  class="news_form_radio" type="radio" name="status" value="1" <?php if($opernbyid['status'] == 1): ?>checked<?php endif; ?>>开
				<input  class="news_form_radio" type="radio" name="status" value="0" <?php if($opernbyid['status'] == 0): ?>checked<?php endif; ?>>关
				</span><br>
				<input type="hidden" name="opern_id" value="<?php echo ($opernbyid["opern_id"]); ?>">
				<input class="news_form_button" type="button" id="submit" value="submit">
			</form>
		</div>
	</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js?v=318"></script>
<script type="text/javascript" src="/WebPiano/Public/js/party/jquery.uploadify.js"></script>
<script type="text/javascript" src="/WebPiano/Public/js/image.js"></script>
<script type="text/javascript">
	var SCOPE={
		'url':'admin.php?c=opern&a=add',
		'jump_url':'admin.php?c=opern',
		'ajax_upload_image_url':'admin.php?c=image&a=ajaxuploadimage',
		'ajax_upload_swf':'/WebPiano/Public/js/party/uploadify.swf'
	}
</script>
</body>
</html>