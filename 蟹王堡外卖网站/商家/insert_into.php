<?php
require_once( "conn.php" );
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>INSERT INTO business </title>
</head>

<body>

	<?php
			 
			 print_r($_POST);

			$sql = "INSERT INTO business (restaurant,Merchantname, Passwords, age,sex) VALUES ('{$_POST['restaurant']}','{$_POST['Merchantname']}', '{$_POST['Passwords']}', '{$_POST['age']}','{$_POST['sex']}')";
			 echo $sql;

			mysqli_query( $conn, $sql);

			mysqli_close( $conn );
	

	?>
	<a href="fetch_table.php">查看数据表</a>


</body>

</html>