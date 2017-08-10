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
			<div class="class_name">音乐管理 -></div>
			<div class="select">
				<form action="admin.php" method="get">
					<input type="hidden" name="c" value="music">
					<div class="search">
						<input type="text" name="title" id="select" placeholder="音乐搜索" value="<?php echo ($name); ?>">
						<button type="submit" id="wp-select"><img src="/WebPiano/Public/image/icon/search.png" width="20px"></button>
					</div>
				</form>
			</div>
		</div>
		<div class="table">
			<table>
				<thead>
					<tr>
						<th width="50"><button type="button" id="listorder">排序</button></th>
						<th>ID</th>
						<th>歌名</th>
						<th>演奏人</th>
						<th>状态</th>
						<th>发布时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				<form id="form-listorder">
					<?php if(is_array($musics)): $i = 0; $__LIST__ = $musics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$music): $mod = ($i % 2 );++$i;?><tr>
							<th><input type="text" name="listorder[<?php echo ($music["music_id"]); ?>]" value="<?php echo ($music["listorder"]); ?>" class="music_order"></th>
							<th><?php echo ($music["music_id"]); ?></th>
							<th><?php echo ($music["name"]); ?></th>
							<th><?php echo ($music["author"]); ?></th>
							<th><span id="status" attr-id="<?php echo ($music["music_id"]); ?>" attr-status="<?php echo ($music["status"]); ?>"><?php echo (getstatus($music["status"])); ?></span></th>
							<th><?php echo (date("Y-m-d H:i",$music["create_time"])); ?></th>
							<th>
								<img src="/WebPiano/Public/image/icon/edit.png" width="20px" id="edit" attr-id="<?php echo ($music["music_id"]); ?>" title="编辑">
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($music["music_id"]); ?>" title="删除">
							</th>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</form>
				</tbody>
			</table>
			<div class="green-black"><?php echo ($pageRes); ?></div>
		</div>
	</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js?v=322"></script>
<script type="text/javascript">
	var SCOPE={
		'add_url':'admin.php?c=music&a=add',
		'status_url':'admin.php?c=music&a=changestatus',
		'delete_url':'admin.php?c=music&a=delete',
		'listorder_url':'admin.php?c=music&a=listorder',
		'jump_url':'admin.php?c=music'
	}
</script>
</body>
</html>