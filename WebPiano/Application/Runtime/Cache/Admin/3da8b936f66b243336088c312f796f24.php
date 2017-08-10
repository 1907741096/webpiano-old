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
			<div class="class_name">曲谱管理 -></div>
			<div class="select">
				<form action="admin.php" method="get">
					<input type="hidden" name="c" value="opern">
					<div class="search">
						<input type="text" name="name" id="select" placeholder="曲谱搜索" value="<?php echo ($name); ?>">
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
						<th>谱名</th>
						<th>收藏数</th>
						<th>状态</th>
						<th>发布时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($operns)): $i = 0; $__LIST__ = $operns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$opern): $mod = ($i % 2 );++$i;?><tr>
							<th><?php echo ($opern["opern_id"]); ?></th>
							<th><?php echo ($opern["name"]); ?></th>
							<th><?php echo ($opern["count"]); ?></th>
							<th><span id="status" attr-id="<?php echo ($opern["opern_id"]); ?>" attr-status="<?php echo ($opern["status"]); ?>"><?php echo (getstatus($opern["status"])); ?></span></th>
							<th><?php echo (date("Y-m-d H:i",$opern["create_time"])); ?></th>
							<th>
								<a href="index.php?c=opern&a=info&id=<?php echo ($opern["opern_id"]); ?>" target="_blank"><img src="/WebPiano/Public/image/icon/look.png" width="20px" id="look" title="查看"></a>
								<img src="/WebPiano/Public/image/icon/edit.png" width="20px" id="edit" attr-id="<?php echo ($opern["opern_id"]); ?>" title="编辑">
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($opern["opern_id"]); ?>" title="删除">
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
		'add_url':'admin.php?c=opern&a=add',
		'status_url':'admin.php?c=opern&a=changestatus',
		'delete_url':'admin.php?c=opern&a=delete'
	}
</script>
</body>
</html>