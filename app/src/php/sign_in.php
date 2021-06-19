<?php 
	$servername = "127.0.0.1";
	$dbname = "calendarapp93";
	$username = "calendarapp93";
	$password = "OZ9vYNCP";
	$dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);

	$login = $_POST['login-log'];
	$password = $_POST['pass-log'];
	$login = filter_var(trim($login), FILTER_SANITIZE_STRING); 
	$pass = filter_var(trim($password), FILTER_SANITIZE_STRING); 
	$result = $dbo->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
	$user = $result->fetch_assoc();
	if ($user) {
		echo "Такой пользователь не найден.";
		exit();
	}
	else if(count($user) == 1){
		echo "Логин или пароль введены неверно";
		exit();
	}
	header("Location: https://calendarapp.hostfl.ru/app/src/pages/calendar.php");
	exit();
 ?>