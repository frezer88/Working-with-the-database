<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $name_db = $_POST['name_db'];
    $name_table = $_POST['name_table'];
    $link->select_db($name_db);#Устанавливает базу данных для выполняемых запросов
    $name_pole = $_POST['pole'];
    //"ALTER TABLE `table_test` DROP `two`;"
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
    <div class="wd">
    <form action="delete_pole_2.php" class="content-form content-form-long" method="post">
            <input name="pole" type="text" value="<?= $name_pole?>" autocomplete="off" placeholder="Название поля"/>
            <input type="hidden" name="name_db" value="<?= $name_db ?>" />
            <input type="hidden" name="name_table" value="<?= $name_table ?>" />
            <button type="submit">Удалить</button>
        </form>
        <form class="glav2" action="./index.php" method="POST">
         <button>На главную</button>
	</form>
    </div>
</body>
</html>