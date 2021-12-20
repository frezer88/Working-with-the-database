<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $name_db = $_POST['name_db'];
    $name_table = $_POST['name_table'];
    print_r($_POST);
    $link->select_db($name_db);#Устанавливает базу данных для выполняемых запросов
    $name_pole = $_POST['pole'];
    $sql = "ALTER TABLE `$name_table` DROP COLUMN `$name_pole`";
    print_r($sql);
    mysqli_query($link,$sql);
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
?>