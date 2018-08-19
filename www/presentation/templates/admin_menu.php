<?php 
if ($_SESSION['admin_log']!==true || !isset($_SESSION['admin_log'])) {
		header('Location: http://'.$_SERVER['SERVER_NAME']. '/admin.php');	
		exit();
	}
?>


	<div align="center" class="admin_menu_link">
		<a href="admin.php?page=add">Добавить новость</a> | 
		<a href="admin.php?page=index">На главную</a> | 
		<a href="admin.php?page=logout">Выйти</a>
	</div>	
	<br>


<?
  switch (@$_GET['page']) {
	case 'add':
		include 'presentation/templates/add_news.php';
		break;
	case 'index':
		header('Location: '. link_to_main_page() );	
		exit();
		break;
	case 'logout':
			unset($_SESSION['admin_log']);
			header('Location: http://'.$_SERVER['SERVER_NAME']. '/admin.php');	
			exit();
			break;	
	default:
		# code...
		break;
}
 ?>

