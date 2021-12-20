<?php
    $mysqli = mysqli_connect("localhost", "root", "root") or die(mysqli_error()); //подключение к БД
	$query_DB = "SHOW DATABASES";
    $result_DB = mysqli_query($mysqli, $query_DB) or die("Ошибка " . mysqli_error($mysqli));
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
    <!--<div class="content">
		<ul class="content-menu">
			<li><a href="create.php">Create</a></li>изменить
			<li><a href="alter.php">Alter</a></li>
			<li><a href="drop.php">Drop</a></li>
			<li><a href="update.php">Update</a></li>
			<li><a href="delete.php">Delete</a></li>
			<li><a href="select.php">Select</a></li>
			<li><a href="insert.php">Insert</a></li>
		</ul>
	</div>-->
	<div class="main">
<div class="bar">
	<ul class="database">
		<li><form class="create_bd" action="create_db.php">
		<button>Создать базу данных</button>
		</form></li>
		 <?php while ($row_DB= mysqli_fetch_assoc($result_DB)) {
			if ($row_DB['Database'] == "information_schema" || $row_DB['Database'] == "mysql" || $row_DB['Database'] == "performance_schema") { } else {
		 ?>
			<li class="name_table">
			     <?php $name_datab = $row_DB['Database'];
				 echo $name_datab; ?>
				 <a href='drop_1.php?id=<?= $name_datab ?>'><th>&#10006;</th></a>
				<ul class="database-table">
					<?php 
						$query_T = "SHOW TABLES FROM ".$row_DB['Database'];
						$result_T = mysqli_query($mysqli, $query_T) or die("Ошибка " . mysqli_error($mysqli));?>
						<li>
							<form class="form-create" action="create_new.php" method="POST">
								<input name="name_bd" hidden value="<?php echo $row_DB['Database']; ?>" >
								<a href='create_new.php?db=<?= $name_datab ?>'>Добавить таблицу</a>
							</form>
						</li>
						<?php 
						while ($row_T= mysqli_fetch_assoc($result_T)) 
						{ $nameTable=$row_T["Tables_in_".$row_DB['Database']];?>

							<li>
								<form class="form-table" action="click_table.php" method="POST">
								<input name="name_table" hidden value="<?php echo $nameTable; ?>">
								<input name="name_datab" hidden value="<?php echo $name_datab; ?>">
								<button><?php echo $nameTable;?></button>
								<a href='drop_1.php?id2=<?= $nameTable . "&id3=" . $name_datab;?>'><th>&#10006;</th></a>
								</form>
							</li> 
						<?php }	
					?>
				</ul>
			</li>
		 <?php }} ?>
		 <li>
			<form class="sql" action="sql_win.php">
			<button>SQL</button>
			</form>
		</li>
		<li>
		<form class="view" action="view.php">
			<button>VIEW</button>
			</form>
		</li>
	 </ul>
	</div>
</div>
	
</body>
</html>