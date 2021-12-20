<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $link->select_db('shop');#Устанавливает базу данных для выполняемых запросов
    $name_db = ($_GET['id']);
    $name_table = ($_GET['id2']);
    $name_db2 = ($_GET['id3']);
    if(isset($name_db2))
    {
        mysqli_query($link,"DROP TABLE $name_db2.$name_table");
    }
    else
    {
        mysqli_query($link,"DROP DATABASE $name_db");
    }
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
?>