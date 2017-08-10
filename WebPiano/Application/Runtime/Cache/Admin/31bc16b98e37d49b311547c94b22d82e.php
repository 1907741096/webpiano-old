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
			<div class="class_name">回复管理 -></div>
			<div class="select">
				<form action="admin.php" method="get">
					<input type="hidden" name="c" value="reply">
					<div class="search">
						<input type="text" name="content" id="select" placeholder="回复内容搜索" value="<?php echo ($content); ?>">
						<button type="submit" id="wp-select"><img src="/WebPiano/Public/image/icon/search.png" width="20px"></button>
					</div>
				</form>
			</div>
		</div>
		<div class="table">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>回复人</th>
						<th>回复评论</th>
						<th>回复内容</th>
						<th>状态</th>
						<th>回复时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($replys)): $i = 0; $__LIST__ = $replys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$reply): $mod = ($i % 2 );++$i;?><tr>
							<th><?php echo ($reply["reply_id"]); ?></th>
							<th><?php echo ($reply["user_id"]); ?></th>
							<th><?php echo ($reply["comment_id"]); ?></th>
							<th><?php echo ($reply["content"]); ?></th>
							<th><span id="status" attr-id="<?php echo ($reply["reply_id"]); ?>" attr-status="<?php echo ($reply["status"]); ?>"><?php echo (getstatus($reply["status"])); ?></span></th>
							<th><?php echo (date("Y-m-d H:i",$reply["create_time"])); ?></th>
							<th>
								<img src="/WebPiano/Public/image/icon/look.png" width="20px" id="look" attr-id="<?php echo ($reply["reply_id"]); ?>" title="查看">
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($reply["reply_id"]); ?>" title="删除">
							</th>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="green-black"><?php echo ($pageRes); ?></div>
		</div>
	</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js?v=317"></script>
<script type="text/javascript">
	var SCOPE={
		'status_url':'admin.php?c=reply&a=changestatus',
		'delete_url':'admin.php?c=reply&a=delete'
	}
</script>
</body>
</html>