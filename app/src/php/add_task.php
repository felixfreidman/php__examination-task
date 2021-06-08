<?php
      header("Location: https://calendarapp.hostfl.ru");
        $servername = "127.0.0.1";
        $dbname = "calendarapp93";
        $username = "calendarapp93";
        $password = "OZ9vYNCP";
        $dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);
        $type = $_POST['selectTypeAdd'];
        $date = $_POST['dateToAdd'];
        $duration = $_POST['timeToAdd'];
        $comment = $_POST['commentAdd'];
        $insert = "INSERT INTO `calendarapp93`.`tasks` (`type`,`comment`,`due_date`, `time`) VALUES ('$type','$comment', '$date', '$duration');";
    $dbo->exec($insert); 
exit();
            ?>