<?php
$link = new mysqli('localhost','root','root');#подключает к серверу баз данных
$link->select_db('shop');#Устанавливает базу данных для выполняемых запросов
$s = mysqli_query($link,"SELECT * FROM `employees`");
$s = mysqli_fetch_all($s);
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
        Реализация DELETE в таблице employees
    </div>
    <table>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Зарплата</th>
            <th>Номер</th>
            <th>Адрес</th>
            <th>Стаж работы</th>
            <th>&#10006;</th>
        </tr>
        <?php
            foreach($s as $item) {
                ?>
                <tr>
                <td><?= $item[1] ?></td>
                <td><?= $item[2] ?></td>
                <td><?= $item[3] ?></td>
                <td><?= $item[4] ?></td>
                <td><?= $item[5] ?></td>
                <td><?= $item[6] ?></td>
                <td><a href="delete_1.php?id=<?= $item[0] ?>">Удалить</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="home">
        <p><a href="index.html"><img src="1.png" width="50" 
        height="50" alt="Главная страница"></a></p>
        </div>
</body>
</html>