<?php 
    $mysqli = mysqli_connect("localhost", "root", "root") or die(mysqli_error()); //подключение к БД
    $mas = $_GET['id'];
    $words = explode(" ", $mas);
    $name_table = $words[2];
    $name_db = $words[1];
    $id = $words[0];
    //$name = $words[3];
    $mysqli->select_db($name_db);#Устанавливает базу данных для выполняемых запросов
    $res =  $mysqli->query("SHOW COLUMNS FROM `$name_table`");
    //print_r($res);
    while($row = $res->fetch_assoc()) {
        if ($row['Extra'] == 'auto_increment')
          $ink = $row['Field'];
        //if ($row['Key'] == 'PRI')
          //echo 'Field with primary key = '.$row['Field'];
      }
    $sql = "DELETE FROM $name_db.$name_table WHERE $ink=$id";
    //print_r($sql);
    mysqli_query($mysqli,$sql);
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
?>
<!-- DELETE FROM test_not_key 
   WHERE id=1? -->