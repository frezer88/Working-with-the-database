
<?php
/*$db = mysqli_connect("localhost", "root", "root") or die(mysqli_error()); //подключение к БД
$sql = mysqli_query($db, "SHOW TABLES FROM `shop`"); //запрос
while ($row = mysqli_fetch_array($sql)) { // массив с данными
    echo "Таблица: <a href='?id_table={$row[0]}'>{$row[0]}</a><br>"; //вывод данных
}
 
echo "В базе `test`: ".mysqli_num_rows($sql)." таблиц"; // вывод числа таблиц*/
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
</head>
<body>
    <div class="h1">
        Реализация INSERT в таблицу employees
    </div>
    <table>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Зарплата</th>
            <th>Номер</th>
            <th>Адрес</th>
            <th>Стаж работы</th>
        </tr>
        <?php
            foreach($s as $item) {
                echo '
                <tr>
                <td>'.$item[1].'</td>
                <td>'.$item[2].'</td>
                <td>'.$item[3].'</td>
                <td>'.$item[4].'</td>
                <td>'.$item[5].'</td>
                <td>'.$item[6].'</td>
                </tr>';
            }
        ?>
    </table>
    <h2>Добавление</h2>
    <form action="Insert_1.php" method="post">
        <p>Имя</p>
        <input type="text" name="name">
        <p>Фамилия</p>
        <input type="text2" name="last_name">
        <p>Зарплата</p>
        <input type="text3" name="salary">
        <p>Номер</p>
        <input type="text4" name="number">
        <p>Адрес</p>
        <input type="text5" name="adr">
        <p>Стаж работы</p>
        <input type="text6" name="work_experience">
        <button type="submit">Добавить</button>
    </form>
    <div class="home">
        <p><a href="index.html"><img src="1.png" width="50" 
        height="50" alt="Главная страница"></a></p>
    </div>
</body> 
</html>