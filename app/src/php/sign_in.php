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
	foreach($dbo->query('SELECT * FROM `users`;') as $row) {
		if(($login == $row['login']) && ($password == $row['password'])){
			header("Location: https://calendarapp.hostfl.ru/app/src/pages/calendar.php");
			exit();
		}
	}
 ?>