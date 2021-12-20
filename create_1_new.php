<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $name_db = $_POST['name_db'];
    $name_table = $_POST['name_table'];
    $kol = $_POST['kol'];
    $mas_post = $_POST;
    //print_r($mas_post);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wd">
        <form action="create_1.php" method="POST">
            <?php
                for($i = 1; $i <= $kol;$i++)
                {
                    echo '<h1>'.$_POST["$i"].'</h1>';
                }
            ?>
            <input name="inkrement" type="text" placeholder="Имя поля"/>
            <input type="hidden" name="name_db" value="<?= $db ?>" />
            <input type="hidden" name="name_table" value="<?= $table ?>" />
            <input type="hidden" name="kol" value="<?= $kol ?>" />
            <input type="hidden" name="post" value="<?= $_POST ?>" />
            <button>Создать</button>
        </form>
    </div>
</body>
</html>