<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $link->select_db('shop');#Устанавливает базу данных для выполняемых запросов
    $s_id = $_GET['id'];
    mysqli_query($link,"DELETE FROM `employees` WHERE `employees`.`id` = '$s_id'");
    exit("<meta http-equiv='refresh' content='0; url= /delete.php'>");

?>