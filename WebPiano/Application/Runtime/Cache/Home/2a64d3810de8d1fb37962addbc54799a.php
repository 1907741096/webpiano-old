<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>WebPiano</title>
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/style.css">
	<link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/page.css">
	<script src="/WebPiano/Public/js/jquery-3.1.1.min.js"></script>
	<script src="/WebPiano/Public/js/layer/layer.js"></script>
	<script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>
<body>
	<div class="info_button">
		<a href="index.php?c=info&a=main">个人资料</a>
		<a href="index.php?c=info&a=news">发帖纪录</a>
		<a href="index.php?c=info&a=comment" class="info_button_true">评论纪录</a>
	</div>
	<div class="info_news">
		<div class="admin_class">
			<div class="select">
				<form action="index.php" method="get">
					<input type="hidden" name="c" value="info">
					<input type="hidden" name="a" value="comment">
					<div class="search">
						<input type="text" name="content" id="select" placeholder="评论搜索" value="<?php echo ($content); ?>">
						<button type="submit" id="wp-select"><img src="/WebPiano/Public/image/icon/search.png" width="20px"></button>
					</div>
				</form>
			</div>
		</div>
		<div class="table">
			<table>
				<thead>
					<tr>
						<th>标题</th>
						<th>内容</th>
						<th>回复时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><tr>
							<th><?php echo ($comment["news_id"]); ?></th>
							<th><?php echo (gettitle($comment["content"])); ?></th>
							<th><?php echo (date("Y-m-d H:i",$comment["create_time"])); ?></th>
							<th>
								<a href="index.php?c=news&a=info&id=<?php echo ($comment["news_id"]); ?>" target="_blank"><img src="/WebPiano/Public/image/icon/look.png" width="20px" id="look" attr-id="<?php echo ($comment["news_id"]); ?>" title="查看"></a>
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($comment["comment_id"]); ?>" title="删除">
							</th>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="green-black"><?php echo ($pageRes); ?></div>
		</div>
	</div>
<script src="/WebPiano/Public/js/common.js?v=328"></script>
<script type="text/javascript">
	var SCOPE={
		'delete_url':'index.php?c=comment&a=delete'
	}
</script>
</body>