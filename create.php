<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $kol = $_POST['kol'];
    $db = $_POST['name_db'];
    $table = $_POST['table'];
    $type = $_POST['type'];
    $size = $_POST['size'];

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
    <form action="create_1.php" method="POST">
    <?php
    for($i=1,$j=$kol+1,$c=$kol+$kol+1; $i <= $kol; $i++,$j++,$c++)
    {
        echo '<input name="'.$i.'" type="text" autocomplete="off" placeholder="Поле '.$i.'"/>';
        //echo '<input type="checkbox" name="'.$k.'"/>';
        //echo '<lable>Автоинкремент</lable>';
        echo '<select name="'.$j.'">
                <option>INT</option>
                <option>VARCHAR</option>
            </select>';
        echo '<input name="'.$c.'" type="number" placeholder="Размер типа" min=1 max=60 required/>';
        echo '<br>';
    }
    ?>
    <?php
        echo '<input class="ink" name="name_ink" type="text" autocomplete="off" placeholder="Поле Автоинкремент"/>';
    ?>
    <button type="submit">Создать</button>
    <input type="hidden" name="name_db" value="<?= $db ?>" />
    <input type="hidden" name="name_table" value="<?= $table ?>" />
    <input type="hidden" name="kol" value="<?= $kol ?>" />
    <!-- <input type="hidden" name="size" value="<?= $size ?>" />
    <input type="hidden" name="type" value="<?= $type ?>" /> -->
    </form>
    <form class="glav" action="./index.php" method="POST">
         <button>На главную</button>
	</form>
    <form action="create_1.php?kol=<?=$kol ?>" method="post">
    <!-- </form> -->
    </div>
</body>
</html>