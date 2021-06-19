<?php 
	$servername = "127.0.0.1";
	$dbname = "calendarapp93";
	$username = "calendarapp93";
	$password = "OZ9vYNCP";
	$dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);

	$login = $_POST['login-reg'];
	$password = $_POST['pass-reg'];
	$login = filter_var(trim($login), FILTER_SANITIZE_STRING); 
	$pass = filter_var(trim($password), FILTER_SANITIZE_STRING); 
	$sql = $dbo->prepare("SELECT * FROM `users` WHERE `login` = ? LIMIT 1;");
	$sqlInsert = $dbo->prepare("INSERT INTO `users` (`login`,`password`) VALUES (:login, :password)");
	$sql->execute([$login]);
	$result = $sql->fetch();
	if($result['login'] == $login) {
		echo "Данный логин уже используется!";
		exit();
	} else {
		$sqlInsert->bindParam(':login',$login);
		$sqlInsert->bindParam(':password',$password);
		$sqlInsert->execute();
		header("Location: https://calendarapp.hostfl.ru/app/src/pages/calendar.php");
		exit();
	}
 ?>