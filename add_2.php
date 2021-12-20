<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $name_db = $_POST['name_db'];
    $name_table = $_POST['name_table'];
    $link->select_db($name_db);#Устанавливает базу данных для выполняемых запросов
    $sql = "INSERT INTO `$name_table` (";
    //print_r($_POST);

    $res = $link->query("SHOW COLUMNS FROM `$name_table`");
    while($row = $res->fetch_assoc()) {
        if ($row['Extra'] == 'auto_increment')
          $ink = $row['Field'];
        //if ($row['Key'] == 'PRI')
          //echo 'Field with primary key = '.$row['Field'];
      }
    //print_r($ink);

    $keys = array_keys($_POST);
    for($i = 0; $i < count($_POST)-2; $i++)
    {
        if($ink != $keys[$i])
        {
            $sql = $sql . "`" . $keys[$i];
            if($i != count($_POST)-3)
            {
                $sql = $sql . "`, ";
            }
        }
    }
    $sql = $sql . "`)" . " VALUES (";
    for($i = 0; $i < count($_POST)-2; $i++)
    {
        if($ink != $keys[$i])
        {
            $sql = $sql . "'" . $_POST["$keys[$i]"] . "'";
            if($i != count($_POST)-3)
            {
                $sql = $sql . ",";
            }
        }
    }
    $sql = $sql . ")";
    print_r($sql);
    mysqli_query($link,$sql); 
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
?>
<!-- INSERT INTO `employees`(`id`, `First_name`, `Last_name`, `Salary`, `Number`, `Address`, `Seniority`) 
VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7]) -->