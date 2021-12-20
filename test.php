<?php
     $link = mysqli_connect("localhost", "root", "root") or die(mysqli_error()); //подключение к БД
     $link->select_db('info');#Устанавливает базу данных для выполняемых запросов
     if (!$link) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
      }

     $sql = "SELECT * FROM user_password";
     if($result = mysqli_query($link, $sql)){
     foreach($result as $row){
         
        $name = $row["user"];
        $password = $row["password"];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/main.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="window">
        <form method="POST">
        <p class="admin" >PhpMyAdmin.Alpha</p>
            <div class="inp">
                <p><input name="name" required type="text" autocomplete="off" placeholder="user"/></p>
                <p><input name="password" required type="text" autocomplete="off" placeholder="password"/></p>
            </div> 

            <button class="btn" type="submit">Войти
            </button>
        </form>
    </div>
    <?php
        if(($name == $_POST['name']) and ($password == $_POST['password']))
        {
            exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
        }
        else
        {
            ?>
            <?php
        }
    ?>
</body>
</html>