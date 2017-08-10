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
		<a href="index.php?c=info&a=news" class="info_button_true">发帖纪录</a>
		<a href="index.php?c=info&a=comment">评论纪录</a>
	</div>
	<div class="info_news">
		<div class="admin_class">
			<div class="select">
				<form action="index.php" method="get">
					<input type="hidden" name="c" value="info">
					<input type="hidden" name="a" value="news">
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
						<th>标题</th>
						<th>内容</th>
						<th>回复数</th>
						<th>置顶</th>
						<th>加精</th>
						<th>发帖时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><tr>
							<th><?php echo ($new["title"]); ?></th>
							<th><?php echo (gettitle($new["content"])); ?></th>
							<th><?php echo ($new["comment"]); ?></th>
							<th><?php echo (getstick($new["stick"])); ?></th>
							<th><?php echo (getfine($new["fine"])); ?></th>
							<th><?php echo (date("Y-m-d H:i",$new["create_time"])); ?></th>
							<th>
								<a href="index.php?c=news&a=info&id=<?php echo ($new["news_id"]); ?>" target="_blank"><img src="/WebPiano/Public/image/icon/look.png" width="20px" id="look" attr-id="<?php echo ($new["news_id"]); ?>" title="查看"></a>
								<img src="/WebPiano/Public/image/icon/delete.png" width="20px" id="delete" attr-id="<?php echo ($new["news_id"]); ?>" title="删除">
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
		'delete_url':'index.php?c=news&a=delete'
	}
</script>
</body>