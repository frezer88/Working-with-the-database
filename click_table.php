<?php 
    $mysqli = mysqli_connect("localhost", "root", "root") or die(mysqli_error()); //подключение к БД
    $_SESSION['name_bd'] = $_POST['name_datab'];
    $_SESSION['name_table'] = $_POST['name_table'];
    $name_bd = $_POST['name_datab'];
    $name_table = $_POST['name_table'];
    $mysqli->select_db($name_bd);#Устанавливает базу данных для выполняемых запросов
    $res =  $mysqli->query("SHOW COLUMNS FROM `$name_table`");
    //print_r($res);
    while($row = $res->fetch_assoc()) {
        if ($row['Extra'] == 'auto_increment')
          $ink = $row['Field'];
        //if ($row['Key'] == 'PRI')
          //echo 'Field with primary key = '.$row['Field'];
      }
    $s = mysqli_query($mysqli,"SELECT * FROM $name_table");
    $s = mysqli_fetch_all($s);
    foreach($s as $item) {
        //print_r($item);
    }
    $count = 0;
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Лабороторная работа №5</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="wd">
    <form class="inp" action="./index.php" method="POST">
         <button>На главную</button>
	</form>
    <form class="inp" action="sql_win.php">
         <button>SQL</button>
	</form>
	</form>
    <form class="inp" action="delete_pole.php" method="POST">
         <button>Удаление поля</button>
         <input type="hidden" name="name_db" value="<?= $name_bd ?>" />
        <input type="hidden" name="name_table" value="<?= $name_table ?>" />
    </form>
    <input type="hidden" name="name_db" value="<?= $name_bd ?>" />
    <input type="hidden" name="name_table" value="<?= $name_table ?>" />
	</form>
    <form class="inp" action="add.php" method="POST">
    <button type="submit">Добавление строки</button>
    <input type="hidden" name="name_db" value="<?= $name_bd ?>" />
    <input type="hidden" name="name_table" value="<?= $name_table ?>" />
    </form>
    <form class="inp" action="add_pole.php" method="POST">
    <button type="submit">Добавление поля</button>
    <input type="hidden" name="name_db" value="<?= $name_bd ?>" />
    <input type="hidden" name="name_table" value="<?= $name_table ?>" />
    </form>
    </div>
    <div class="content">
        <?php
               $query="SELECT * FROM " .$_SESSION['name_bd']. "." .$_SESSION['name_table'];
               $result = mysqli_query($mysqli, $query) or die("Ошибка" . mysqli_error($mysqli));
               $cols = mysqli_num_fields($result);
               $names = mysqli_fetch_fields($result);
               $rows = mysqli_num_rows($result);
        
             if($result == true) { ?>
             <table>
               <tr>
             <?php foreach ($names as $name) 
                  {
                    echo "<th>$name->name</th>";
                    $count++;
                    if($name->name == $ink)
                        $num = $count;
                  }?>
              </tr>
             <?php for ($i = 0 ; $i < $rows ; ++$i) { ?>
            <tr>
                <?php {
                    $row = mysqli_fetch_row($result);
                    for ($j = 0; $j < $cols; ++$j) 
                    {
                        echo "<td>$row[$j]</td>";
                    }
                    ?>
                    <?php 
                    if($ink)
                    {
                    ?>
                        <td><a href="delete_stroka.php?id=<?=$row[$num-1]?> <?=$name_bd?> <?=$name_table?>">&#10006</a></td>
                        <td><a href="update_1.php?id=<?=$row[$num-1]?> <?=$name_bd?> <?=$name_table?>">&#9998</a></td>
                        <?php 
                        
                    }
                        ?> 
                    <?php                     
                } ?>
            </tr>
        <?php } ?>
    </table>
    <?php } ?>
    </div>
</body>