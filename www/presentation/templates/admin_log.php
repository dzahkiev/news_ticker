<?php
if (isset($_POST['submit'])) {
	if ($_POST['login']==ADMIN_LOGIN && $_POST['password']==ADMIN_PASSWORD) {
		$_SESSION['admin_log']=true;
		header('Location: http://'.$_SERVER['SERVER_NAME']. '/admin.php');	
		exit();
	}
		
	else 
		echo "Неверные данные! Повторите попытку.";
		 
	}
?>

<form class="admin_form" name="admin_form" method="post" action="admin.php">
<p>Введите данные авторизации:</p>
<br>
<p>
	<p>Логин:</p>
	<input class="input_admin" type="text" name="login" size="15" value="admin"></input>
</p>
<p>
	<p>Пароль:</p>
	<input class="input_admin" type="password" name="password" size="15" value="admin"></input>
</p>
<input class="button_admin_log" type="submit" name="submit" value="Войти" />
</form>
