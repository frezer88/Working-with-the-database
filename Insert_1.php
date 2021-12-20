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
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$salary = (int)$_POST['salary'];
$number = (int)$_POST['number'];
$adr = $_POST['adr'];
$work_experience = (int)$_POST['work_experience'];
print_r($_POST);
$stmt = $link->prepare("INSERT INTO `employees` (`First_name`, `Last_name`, `Salary`, `Number`, `Address`, `Seniority`) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiisi",$name,$last_name,$salary,$number,$adr,$work_experience);
$stmt->execute();//выполнить команду
ob_start();
$new_url = 'http://localhost/insert.php';
header('Location: '.$new_url);
ob_end_flush();
exit("<meta http-equiv='refresh' content='0; url= /insert.php'>");
?>