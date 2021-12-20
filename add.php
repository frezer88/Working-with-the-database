<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $name_bd = $_POST['name_db'];
    $name_table = $_POST['name_table'];
    $link->select_db($name_bd);#Устанавливает базу данных для выполняемых запросов
    $res = $link->query("SHOW COLUMNS FROM `$name_table`");
    //print_r($res);
    while($row = $res->fetch_assoc()) {
        if ($row['Extra'] == 'auto_increment')
          $ink = $row['Field'];
        //if ($row['Key'] == 'PRI')
          //echo 'Field with primary key = '.$row['Field'];
      }
    //print_r($ink);
    $col = mysqli_query($link,"describe $name_bd.$name_table");
    $col2 = mysqli_fetch_all($col);
    $arr_name = array();
    for($i = 0; $i < count($col2);$i++)
    {
        $arr_name[$i] = $col2[$i]['0'];
    }

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
    <div class="wd">
    <form action="add_2.php" class="content-form content-form-long" method="post">
            <?php 
                for($i = 0; $i < count($arr_name);$i++)
                {
                    if($ink != $arr_name[$i])
                    {      
                    ?>
                    <input  name="<?= $arr_name[$i] ?>"  placeholder= "<?= $arr_name[$i] ?>" />
                    <!-- <input type="hidden" name="<?= $arr_name[$i] ?>"> -->
                    <?php
                    }
                }
            ?>
            <input type="hidden" name="name_db" value="<?= $name_bd ?>" />
            <input type="hidden" name="name_table" value="<?= $name_table ?>" /> 
            <button type="submit">Добавление</button>
</form>
<form action="add_2.php" method="post">
    <input type="hidden" name="name_db" value="<?= $name_bd ?>" />
    <input type="hidden" name="name_table" value="<?= $name_table ?>" />
    <?php 

    ?>
</form>
    </div>
</body>
</html>