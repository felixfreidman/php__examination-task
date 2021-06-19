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
	$sql1 = $dbo->prepare("SELECT * FROM `users` WHERE `login` = ? LIMIT 1;");
	$sql2 = $dbo->prepare("SELECT * FROM `users` WHERE `password` = ? LIMIT 1;");
	$sql1->execute([$login]);
	$sql2->execute([$password]);
	$result1 = $sql1->fetch();
	$result2 = $sql2->fetch();
	if(($login == $result1['login']) && ($password == $result2['password'])) {
		header("Location: https://calendarapp.hostfl.ru/app/src/pages/calendar.php");
		exit();
	}else {
		echo "Error";
	}
	
 ?>