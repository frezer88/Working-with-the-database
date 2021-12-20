<?php
    $db = mysqli_connect("localhost", "root", "root") or die(mysqli_error()); //подключение к БД
    $sql = mysqli_query($db, "SHOW TABLES FROM `shop`"); //запрос

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body>
    <div class="h1">
        Реализация DROP
    </div>

    <?php
    while ($row = mysqli_fetch_array($sql)) { // массив с данными
        
        echo "Таблица: <td>{$row[0]}</td> <a href='drop_1.php?id=$row[0]'<th>&#10006;</th></a> <br>"; //вывод данных
    }
    echo "В базе `shop`: ".mysqli_num_rows($sql)." таблиц"; // вывод числа таблиц*/
    ?>
    <div class="home">
        <p><a href="index.html"><img src="1.png" width="50" 
        height="50" alt="Главная страница"></a></p>
        </div>
</body>
</html>