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
			<div class="class_name">收藏管理 -></div>
		</div>
		<div class="table">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>收藏ID</th>
						<th>曲谱ID</th>
						<th>收藏时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($collects)): $i = 0; $__LIST__ = $collects;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$collect): $mod = ($i % 2 );++$i;?><tr>
							<th><?php echo ($collect["collect_id"]); ?></th>
							<th><?php echo ($collect["user_id"]); ?></th>
							<th><?php echo ($collect["opern_id"]); ?></th>
							<th><?php echo (date("Y-m-d H:i",$collect["create_time"])); ?></th>
							<th>
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($collect["collect_id"]); ?>" title="删除">
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
		'delete_url':'admin.php?c=collect&a=delete'
	}
</script>
</body>
</html>