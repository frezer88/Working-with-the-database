<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $link->select_db('shop');#Устанавливает базу данных для выполняемых запросов
    print_r($_POST);
    $name_db = $_POST['name_db'];
    $name_table = $_POST['name_table'];
    //print_r(count($_POST));
    $link->select_db($name_db);#Устанавливает базу данных для выполняемых запросов
    $res =  $link->query("SHOW COLUMNS FROM `$name_table`");
    //print_r($res);
    while($row = $res->fetch_assoc()) {
        if ($row['Extra'] == 'auto_increment')
          $ink = $row['Field'];
        //if ($row['Key'] == 'PRI')
          //echo 'Field with primary key = '.$row['Field'];
      }
    $k = 0;
    $s = mysqli_query($link,"SELECT * FROM $name_table");
    $s = mysqli_fetch_assoc($s);//данные в виде ассоциативного массива
    $sql = "UPDATE `$name_table` SET ";
    //print_r($s); 
    for($i = 0;$i < count($s);$i++)
    {
        if($ink != key($s))
        {
            $sql = $sql . key($s) . "=" . '"' . $_POST["$k"] . '"';
            if($i != count($s)-1)
                $sql = $sql . ",". " ";
            next($s);
            $k++;
        }
        else{
            $k++;
            next($s);
        }
    }
    $sql = $sql . " WHERE 1";
    //print_r($sql);
    mysqli_query($link,$sql); 
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
?>