<?php 
	$servername = "127.0.0.1";
	$dbname = "calendarapp93";
	$username = "calendarapp93";
	$password = "OZ9vYNCP";
	$dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);

	$login = $_POST['login-reg'];
	$password = $_POST['pass-regd'];
	$login = filter_var(trim($login), FILTER_SANITIZE_STRING); 
	$pass = filter_var(trim($password), FILTER_SANITIZE_STRING); 
	if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
		echo "Недопустимая длина логина";
		exit();
	}
	$result1 = $dbo->query("SELECT * FROM `users` WHERE `login` = '$login'");
	$user1 = $result1->fetch_assoc(); 
	if(!empty($user1)){
		echo "Данный логин уже используется!";
		exit();
	} else {
		$insert = "INSERT INTO `users` (`login`,`password`) VALUES ('$login','$password');";
		$dbo->exec($insert); 
}
header("Location: https://calendarapp.hostfl.ru/app/src/pages/calendar.php");
exit();
 ?>