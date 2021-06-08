<html>

<head>
    <title>Calendar</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/app/src/styles/css/header.css" />
    <link rel="stylesheet" href="/app/src/styles/css/main.css" />
    <link rel="stylesheet" href="/app/src/styles/css/card_actions.css" />
    <link rel="shortcut icon" href="/app/src/images/favicon.png" type="image/x-icon" />
</head>

<body>
    <div class="dark hide" id="darkAdd">
        <div class="modal-window modal-window_type_add">
            <div class="subheader">Add Task</div>
            <form class="modal-window__form" action="/app/src/php/add_task.php" method="post">
                <button class="modal-window__close-btn" type="button" onclick="closeModalWindowToAdd()"></button>
                <select class="modal-window__form-select" id="typeInput" name="selectTypeAdd" required="required">
                    <option value="" selected="selected" disabled="disabled">
                        Type of Business
                    </option>
                    <option value="Business">Business</option>
                    <option value="Call">Call</option>
                    <option value="Case">Case</option>
                    <option value="Meeting">Meeting</option>
                </select>
                <textarea class="modal-window__form-textarea" id="commentInput" name="commentAdd" pattern="^[a-zA-Z]+$"
                    placeholder="Task Description" required="required"></textarea>
                <input class="modal-window__form-input" id="dateInput" type="date" name="dateToAdd"
                    required="required" />
                <input class="modal-window__form-input" id="timeInput" type="text" name="timeToAdd" placeholder="Time"
                    data-mask="__:__" data-slots="_" data-accept="[0-9]" required="required" size="4" />
                <button class="modal-window__form-btn" type="submit">Add</button>
            </form>
        </div>
    </div>
    <div class="dark hide" id="darkEdit">
        <div class="modal-window modal-window_type_edit">
            <div class="subheader">Edit Task</div>
            <form class="modal-window__form" action="/app/src/php/edit_task.php" method="post">
                <button class="modal-window__close-btn" type="button" onclick="closeModalWindowToEdit()"></button>
                <select class="modal-window__form-select" id="typeInputUpdate" name="selectTypeUpdate"
                    required="required">
                    <option value="" selected="selected" disabled="disabled">
                        Type of Business
                    </option>
                    <option value="Business">Business</option>
                    <option value="Call">Call</option>
                    <option value="Case">Case</option>
                    <option value="Meeting">Meeting</option>
                </select>
                <textarea class="modal-window__form-textarea" id="commentInputUpdate" name="commentUpdate"
                    pattern="^[a-zA-Z]+$" placeholder="Task Description" required="required"></textarea>
                <input class="modal-window__form-input" id="dateInputUpdate" type="date" name="dateToUpdate"
                    required="required" />
                <input class="modal-window__form-input" id="timeInputUpdate" type="text" name="timeToUpdate"
                    placeholder="Time" data-mask="__:__" data-slots="_" data-accept="[0-9]" required="required"
                    size="4" />
                <button class="modal-window__form-btn" type="submit">Edit</button>
                <input id="idInputUpdate" type="text" readonly="readonly" name="idInputUpdate"
                    style="visibility: hidden" />
            </form>
        </div>
    </div>
    <div class="dark hide" id="darkDelete">
        <div class="modal-window modal-window_type_delete">
            <div class="subheader">Are you sure?</div>
            <form class="modal-window__form" action="/app/src/php/delete_task.php" method="post">
                <button class="modal-window__close-btn" type="button" onclick="closeModalWindowToDelete()"></button>
                <button class="modal-window__form-btn" type="submit">Delete</button>
                <button class="modal-window__form-btn" type="button" onclick="closeModalWindowToDelete()">
                    Cancel
                </button>
                <input id="idInputDelete" type="text" readonly="readonly" name="idInputDelete"
                    style="visibility: hidden; position: absolute; top: 0; left: 0;" />
            </form>
        </div>
    </div>
    <div class="main-section">
        <div class="main-section__container">
            <div class="table-calendar">
                <div class="subheader">CALENDAR</div>
                <div class="table-calendar__content">
                    <div class="table-calendar__panel-content">
                        <form class="table-calendar__form" action="/app/src/php/transport.php" method="post">
                            <select class="table-calendar__form-select" id="taskTypeSelect" name="taskType">
                                <option value="alltasks">All Tasks</option>
                                <option value="ongoingtasks">Ongoing Tasks</option>
                                <option value="expiredtasks" selected="selected">Expired Tasks</option>
                                <option value="todaytasks">Today Tasks</option>
                                <option value="tommorowtasks">Tomorrow Tasks</option>
                            </select>
                            <button class=" table-calendar__form-btn" type="submit">
                                Filter
                            </button>
                        </form>
                    </div>
                    <div class="table-calendar__task-content">
                        <div class="task-card">
                            <div class="task-card__header-type">Type</div>
                            <div class="task-card__header-task" style="font-size: 20px">Tasks</div>
                            <div class="task-card__header-time">Date and Time</div>
                        </div>
                        <?php 
                         $servername = "127.0.0.1";
                         $dbname = "calendarapp93";
                         $username = "calendarapp93";
                         $password = "OZ9vYNCP";
                         $dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);
                         $currentDay  = date("d");
                         $currentMonth = date("m");
                         $currentYear = date("Y");
                         $currentDate = $currentYear . '-' . $currentMonth . '-' . $currentDay;
                         foreach ($dbo->query("SELECT * FROM `tasks` WHERE `due_date` < '$currentDate';") as $row) {
                           echo
                                ' 
                                <div class="task-card node'.$row['ID'].'" onclick=openModalWindowToEdit("node'.$row['ID'].'") oncontextmenu=openModalWindowToDelete("node'.$row['ID'].'") >
                                  <div class="task-card__header-type node'.$row['ID'].'">' . $row['type'] . '</div>
                                  <div class="task-card__header-task node'.$row['ID'].'">' . $row['comment'] . '</div>
                                  <div class="task-card__header-time node'.$row['ID'].'">' . $row['due_date'] . ' , '. substr($row['time'], 0, 5).'</div>
                                </div>
                                ';
                         }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-section__add-btn" onclick="openModalWindowToAdd()">
        <img src="/app/src/images/cross.svg" alt="ADD" />
    </div>
    <script src="/app/src/js/index.js"></script>
</body>

</html>