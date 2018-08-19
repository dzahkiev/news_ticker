<?php
session_start();
require_once  'config/conf.php';
require_once SITE_ROOT . '/presentation/db_operations.php';
require_once SITE_ROOT . '/presentation/link.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админка</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?
if (isset($_SESSION['admin_log']))
	include SITE_ROOT . '/presentation/templates/admin_menu.php';
else
	include SITE_ROOT . '/presentation/templates/admin_log.php';
 ?>
	
</body>
</html>



