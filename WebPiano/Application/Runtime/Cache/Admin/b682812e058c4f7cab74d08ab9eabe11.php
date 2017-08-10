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
			<div class="class_name">管理员管理 -></div>
			<div class="select">
				<form action="admin.php" method="get">
					<input type="hidden" name="c" value="admin">
					<div class="search">
						<input type="text" name="username" id="select" placeholder="账号搜索" value="<?php echo ($username); ?>">
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
						<th>账号</th>
						<th>昵称</th>
						<th>邮箱</th>
						<th>状态</th>
						<th>最后登录时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($admins)): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?><tr>
							<th><?php echo ($admin["admin_id"]); ?></th>
							<th><?php echo ($admin["username"]); ?></th>
							<th><?php echo ($admin["name"]); ?></th>
							<th><?php echo ($admin["email"]); ?></th>
							<th><span id="status" attr-id="<?php echo ($admin["admin_id"]); ?>" attr-status="<?php echo ($admin["status"]); ?>"><?php echo (getstatus($admin["status"])); ?></span></th>
							<th><?php echo (date("Y-m-d H:i",$admin["lastlogin_time"])); ?></th>
							<th>
								<img src="/WebPiano/Public/image/icon/edit.png" width="20px" id="edit" attr-id="<?php echo ($admin["admin_id"]); ?>">
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($admin["admin_id"]); ?>">
							</th>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="green-black"><?php echo ($pageRes); ?></div>
		</div>
	</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js"></script>
<script type="text/javascript">
	var SCOPE={
		'add_url':'admin.php?c=admin&a=add',
		'status_url':'admin.php?c=admin&a=changestatus',
		'delete_url':'admin.php?c=admin&a=delete'
	}
</script>
</body>
</html>