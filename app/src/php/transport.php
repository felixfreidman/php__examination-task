<?php
$taskType = $_POST['taskType'];
switch($taskType){
    case "ongoingtasks":
        header("Location: https://calendarapp.hostfl.ru/app/src/pages/ongoing_tasks.php");
        break;
    case "expiredtasks":
        header("Location: https://calendarapp.hostfl.ru/app/src/pages/expired_tasks.php");
        break;
    case "todaytasks":
        header("Location: https://calendarapp.hostfl.ru/app/src/pages/today_tasks.php");
        break;
    case "tommorowtasks":
        header("Location: https://calendarapp.hostfl.ru/app/src/pages/tomorrow_tasks.php");
        break;
    case "alltasks":
        header("Location: https://calendarapp.hostfl.ru/app/src/pages/calendar.php");
        break;
}
?>