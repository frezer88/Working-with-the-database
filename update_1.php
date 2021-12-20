<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $link->select_db('shop');#Устанавливает базу данных для выполняемых запросов
    $mas = $_GET['id'];
    $words = explode(" ", $mas);
    $name_table = $words[2];
    $name_db = $words[1];
    $id = $words[0];
    $link->select_db($name_db);#Устанавливает базу данных для выполняемых запросов
    $res =  $link->query("SHOW COLUMNS FROM `$name_table`");
    //print_r($res);
    while($row = $res->fetch_assoc()) {
        if ($row['Extra'] == 'auto_increment')
          $ink = $row['Field'];
        //if ($row['Key'] == 'PRI')
          //echo 'Field with primary key = '.$row['Field'];
      }
    $s = mysqli_query($link,"SELECT * FROM $name_table WHERE $ink=$id");
    $s = mysqli_fetch_assoc($s);//данные в виде ассоциативного массива
    $k = $s;
    //print_r($s);
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
    <form class="wd" action="update_2.php" method="post">
        <!-- <input type="hidden" name="id" value="<?=$s_id?>">
        <p>Имя</p>
        <input type="text" name="name" value="<?=$s['First_name']?>">
        <p>Фамилия</p>
        <input type="text2" name="last_name" value="<?=$s['Last_name']?>">
        <p>Зарплата</p>
        <input type="text3" name="salary" value="<?=$s['Salary']?>">
        <p>Номер</p>
        <input type="text4" name="number" value="<?=$s['Number']?>">
        <p>Адрес</p>
        <input type="text5" name="adr" value="<?=$s['Address']?>">
        <p>Стаж работы</p>
        <input type="text6" name="work_experience" value="<?=$s['Seniority']?>">
        <button type="submit">Обновить</button> -->
        <?php
            for($i = 0; $i < count($s);$i++)
            {
                $first = array_shift($k);
                if($s[$ink] !=  $first)//тут надо додумать насчет id
                {
                    ?> 
                     <input name="<?=$i?>" placeholder="<?=$first?>">
                    <?php
                }
            }
        ?>
        <button type="submit">Обновить</button>
        <input type="hidden" name="name_table" value="<?=$name_table?>">
        <input type="hidden" name="name_db" value="<?=$name_db?>">
    </form>
</body>
</html>