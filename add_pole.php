<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $name_bd = $_POST['name_db'];
    $name_table =  $_POST['name_table'];
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
    <form class="wd" action="add_pole_2.php" method="POST">
    <?php
        if(isset($ink))
        {
            ?>
            <input name="name" type="text" autocomplete="off" placeholder="Имя поля"/>

            <select name="type">
                <option>INT</option>
                <option>VARCHAR</option>
            </select>
            <input name="size" type="number" placeholder="Размер типа" min=1 max=60 required/>
            <br>
            
            <?php
        }
        else
        {
            ?>
                <input name="name" type="text" autocomplete="off" placeholder="Имя поля"/>

                <select name="type">
                    <option>INT</option>
                    <option>VARCHAR</option>
                </select>
                <input name="size" type="number" placeholder="Размер типа" min=1 max=60 required/>
                <input class="ink" name="name_ink" type="text" autocomplete="off" placeholder="Поле Автоинкремент"/>
            <?php
        } 
    ?>
    <button type="submit">Создать</button>
    <input type="hidden" name="name_bd" value="<?= $name_bd ?>" />
    <input type="hidden" name="name_table" value="<?= $name_table ?>" />
    </form>
</body>
</html>