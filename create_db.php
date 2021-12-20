<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
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
    <form method="POST">
        <input name="name" type="text" autocomplete="off" placeholder="Название"/>
        <button class="bt" type="submit">Создать
        </button>
        <?php
        $name_db = ($_POST["name"]);
        mysqli_query($link,"CREATE DATABASE $name_db");
        ?>
    </form>
    <form class="glav" action="./index.php" method="POST">
         <button>На главную</button>
	</form>
    </div>
</body>
</html>