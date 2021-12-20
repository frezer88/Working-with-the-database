<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $db = ($_GET['db']);
    $link->select_db($db);#Устанавливает базу данных для выполняемых запросов
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/main.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<form class="sql" action="sql_win.php">
         <button>SQL</button>
</form>
<div class="wd">
        <form action="create.php" class="content-form content-form-long" method="post">
            <input name="table" type="text" autocomplete="off" placeholder="Название таблицы"/>
            <input name="kol" type="text" autocomplete="off" placeholder="Количество полей"/>
            <input type="hidden" name="name_db" value="<?= $db ?>" />
            <button type="submit">Перейти к заполнению</button>
        </form>
        <form class="glav" action="./index.php" method="POST">
         <button>На главную</button>
	</form>
    </div>
</body>
</html>