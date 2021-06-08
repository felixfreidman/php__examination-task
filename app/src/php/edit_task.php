<?php
      header("Location: https://calendarapp.hostfl.ru");
        $servername = "127.0.0.1";
        $dbname = "calendarapp93";
        $username = "calendarapp93";
        $password = "OZ9vYNCP";
        $dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);
      $type = $_POST['selectTypeUpdate'];
      $date = $_POST['dateToUpdate'];
      $duration = $_POST['timeToUpdate'];
      $comment = $_POST['commentUpdate'];
      $id = $_POST['idInputUpdate'];

    //   UPDATE `tasks` SET `comment` = 'Hello', `type` = 'Business', `due_date` = '2021-07-30', `duration` = 1 WHERE `topic` = 'cure'
      $update = "UPDATE `tasks` SET `type` = '$type', `due_date` = '$date', `time` = '$duration', `comment` = '$comment' WHERE `ID` = '$id'";
    $dbo->exec($update); 
    exit();
            ?>