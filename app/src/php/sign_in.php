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
	$sql = $dbo->prepare("SELECT * FROM `users` WHERE `login` = ? AND `password` = ?;");
	$sql->execute([$login, $password]);
	$result = $sql->fetch();
	if(($login == $result['login']) && ($password == $result['password'])) {
		header("Location: https://calendarapp.hostfl.ru/app/src/pages/calendar.php");
		exit();
	}else {
		echo "Error";
	}
	
 ?>