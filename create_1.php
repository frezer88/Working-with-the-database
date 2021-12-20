<?php
    $link = new mysqli('localhost','root','root');#подключает к серверу баз данных
    $db = $_POST['name_db'];
    $table = $_POST['name_table'];
    $kol = $_POST['kol'];
    $prov = 0;

    //print_r($_POST);
    $sql = "CREATE TABLE `$db`.`$table` (";
    //$i <= (count($_POST)-2)/3
    for($count = 1,$i = 1,$j=$kol+1,$c=$kol+$kol+1; $count <= $kol; $i++,$j++,$c++,$count++)
    {
        if($i != '1')
        {   
            $sql = $sql . ", ";
        }
        //print_r($_POST["$j"]);
        $type = $_POST["$j"];
        $size = $_POST["$c"];
        if($_POST['name_ink'] == $_POST["$i"])
        {
            if($_POST["$j"] == "INT")
            {
                $sql = $sql . $_POST["$i"] . " $type($size) NOT NULL AUTO_INCREMENT";
                $prov = 1;
            }
            else
                //$sql = $sql . $_POST["$i"] . " $type($size) NOT NULL";
                exit("<meta http-equiv='refresh' content='0; url= /index.php'>");

        }
        else
        {
            $sql = $sql . $_POST["$i"] . " $type($size) NOT NULL";
        }
    }
    if($prov == 1)
    {
        $sql = $sql . ", PRIMARY KEY (";
        $sql = $sql . $_POST['name_ink']; 
        $sql = $sql . ") )";
    }
    else
    {
        $sql = $sql . ")";
    }
    //echo $sql;
    mysqli_query($link,$sql);
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
?>
<!-- CREATE TABLE Persons (
    ID int NOT NULL AUTO_INCREMENT,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Age int,
    PRIMARY KEY (ID)
); -->
