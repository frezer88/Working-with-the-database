<?php
    $mysqli = mysqli_connect("localhost", "root", "root") or die(mysqli_error()); //подключение к БД
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
    <div class="wd">
    <form method="POST">
        <input name="query" />
        <button> 
            Запрос
        </button>
    </form>
    <form class="glav2" action="./index.php" method="POST">
         <button>На главную</button>
	</form>
    </div>
    <?php
        if($_POST['query'])
        {
            $result = mysqli_query($mysqli, $_POST['query']);
            if($result)
            {
                if(gettype($result) == "boolean")
                {
                    echo "Ваш запрос выполнен";
                }
                else
                {
                    $cols = mysqli_num_fields($result);
                    $names = mysqli_fetch_fields($result);
                    $rows = mysqli_num_rows($result);
                    if($rows)
                    {
                        echo "<table> <tr>";
                        foreach ($names as $name) 
                        {
                          echo "<th>$name->name</th>";
                        }
                        echo "</tr>";
                        for($i = 0 ; $i < $rows ; ++$i) 
                        {
                            echo "<tr>";
                            $row = mysqli_fetch_row($result);
                            for ($j = 0 ; $j < $cols; ++$j) 
                                echo "<td>$row[$j]</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }               
            }
            else
            {
                echo "Ваш запрос не выполнен!<p>";
                echo mysqli_error($mysqli);
            }
        }
    ?>
</body>
</html>