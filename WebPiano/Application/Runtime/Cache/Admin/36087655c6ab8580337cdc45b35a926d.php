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
			<div class="class_name">帖子管理 -></div>
			<div class="select">
				<form action="admin.php" method="get">
					<input type="hidden" name="c" value="news">
					<div class="search">
						<input type="text" name="title" id="select" placeholder="帖子搜索" value="<?php echo ($title); ?>">
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
						<th>标题</th>
						<th>发帖人</th>
						<th>回复数</th>
						<th>置顶</th>
						<th>加精</th>
						<th>状态</th>
						<th>发帖时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><tr>
							<th><?php echo ($new["news_id"]); ?></th>
							<th><?php echo ($new["title"]); ?></th>
							<th><?php echo ($new["name"]); ?></th>
							<th><?php echo ($new["commentnum"]); ?></th>
							<th><span id="stick" attr-id="<?php echo ($new["news_id"]); ?>" attr-stick="<?php echo ($new["stick"]); ?>"><?php echo (getstick($new["stick"])); ?></span></th>
							<th><span id="fine" attr-id="<?php echo ($new["news_id"]); ?>" attr-fine="<?php echo ($new["fine"]); ?>"><?php echo (getfine($new["fine"])); ?></span></th>
							<th><span id="status" attr-id="<?php echo ($new["news_id"]); ?>" attr-status="<?php echo ($new["status"]); ?>"><?php echo (getstatus($new["status"])); ?></span></th>
							<th><?php echo (date("Y-m-d H:i",$new["create_time"])); ?></th>
							<th>
								<a href="index.php?c=news&a=info&id=<?php echo ($new["news_id"]); ?>" target="_blank"><img src="/WebPiano/Public/image/icon/look.png" width="20px" id="look" attr-id="<?php echo ($new["news_id"]); ?>" title="查看"></a>
								<img src="/WebPiano/Public/image/icon/edit.png" width="20px" id="edit" attr-id="<?php echo ($new["news_id"]); ?>" title="编辑">
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($new["news_id"]); ?>" title="删除">
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
		'add_url':'admin.php?c=news&a=add',
		'status_url':'admin.php?c=news&a=changestatus',
		'stick_url':'admin.php?c=news&a=changestick',
		'fine_url':'admin.php?c=news&a=changefine',
		'delete_url':'admin.php?c=news&a=delete'
	}
</script>
</body>
</html>