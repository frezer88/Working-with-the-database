<?php
$link = new mysqli('localhost','root','root');#подключает к серверу баз данных
$link->select_db('shop');#Устанавливает базу данных для выполняемых запросов
    #require_once '.\database.php';
    #print_r($_GET);
    if($_GET)
    {
        if($_GET['query'])#текст запроса
        {
            #echo $_GET['One'];
            $result = $link->query($_GET['query']);
            
            #print_r($result);
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
    <div class="wd">
    <form method="Get">
            <button class="request_1" name="query" value="SELECT * FROM select_fname_and_lname">
                <h1>Запрос 1</h1>    
            </button>
       
            <button class="request_2" name="query" value="SELECT * FROM select_fname_and_lname_and_address_asc">
                <h1>Запрос 2</h1>    
            </button>
       
            <button class="request_3" name="query" value="SELECT * FROM select_fname_and_lname_and_seniority_sample">
                <h1>Запрос 3</h1>    
            </button>
        </form>
        <div class="window">
            <?php
            if($result)
            {
                $cols = $result->field_count;
                $rows = $result->num_rows;
                $info = $_GET['query'];
                //echo "<h2>$info</h2>";#текст запроса
                echo "<table><tr>";
                for($i = 0; $i < $cols;++$i)
                {
                    $field=$result->fetch_field_direct($i);
                    echo "<th>$field->name</th>";
                }
                echo "</tr>";
                for($i = 0;$i < $rows;++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    foreach($row as $cel)
                    {
                        echo "<td>$cel</td>";
                    }
                    echo "</tr>";
                }

                echo "</table>";
            }
            ?>
        </div>
    </div>
    </div>
    <form class="glav2" action="./index.php" method="POST">
         <button>На главную</button>
	</form>
</body>
</html>