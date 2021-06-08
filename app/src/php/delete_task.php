<?php
      header("Location: https://calendarapp.hostfl.ru");
        $servername = "127.0.0.1";
        $dbname = "calendarapp93";
        $username = "calendarapp93";
        $password = "OZ9vYNCP";
        $dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);
        $id = $_POST['idInputDelete'];
        $delete = "DELETE FROM `tasks` WHERE `ID` = '$id'";
        $dbo->exec($delete); 
        exit();
?>