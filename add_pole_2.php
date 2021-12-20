<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $name_bd = $_POST['name_bd'];
    $name_table =  $_POST['name_table'];
    $link->select_db($name_bd);#Устанавливает базу данных для выполняемых запросов
    $type = $_POST['type'];
    $size = $_POST['size'];
    $name = $_POST['name'];
    print_r($_POST);
    $res = $link->query("SHOW COLUMNS FROM `$name_table`");
    //print_r($res);
    while($row = $res->fetch_assoc()) {
        if ($row['Extra'] == 'auto_increment')
          $ink = $row['Field'];
        //if ($row['Key'] == 'PRI')
          //echo 'Field with primary key = '.$row['Field'];
      }
    if(isset($ink))
    {
        $sql = "ALTER TABLE $name_bd.$name_table ADD ($name $type($size) NULL)";
        print_r($sql);
        mysqli_query($link,$sql); 
    }
    else
    {
        if(isset($_POST['name_ink']))
            $sql = "ALTER TABLE $name_bd.$name_table ADD ($name $type($size) NULL AUTO_INCREMENT, PRIMARY KEY ($name))";
        else
            $sql = "ALTER TABLE $name_bd.$name_table ADD ($name $type($size) NULL)";
        print_r($sql);
        mysqli_query($link,$sql); 
    }
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
    //ALTER TABLE dbo.doc_exa ADD column_b VARCHAR(20) NULL, column_c INT NULL ;
?>