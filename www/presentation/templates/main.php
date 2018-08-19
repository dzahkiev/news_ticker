<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Новости</title>
	<link rel="stylesheet" type="text/css" href="\styles\style.css">
</head>
<body>
<div class="top_main">
	<div class="top_menu">
		<span class="logo"><a href="http://<?=$_SERVER['SERVER_NAME']?>">НОВОСТИ</a></span>
		<? include SITE_ROOT . '/presentation/templates/category.php'; ?>
		<div class="search_box"><? include SITE_ROOT . '/presentation/templates/search.php'; ?></div>
	</div>
</div>
<div id="maket">
		<? 
		if(isset($_GET['item']))
		include SITE_ROOT . '/presentation/templates/news_item.php';	
		else
		include SITE_ROOT . '/presentation/templates/news.php'; ?>
 </div>
 <div class="clearfix"></div>
<div class="footer">

	(c) All rights reserved.
</div>
</body>
</html>