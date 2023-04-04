<?php
require_once( "conn.php" );
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>INSERT INTO customer_information </title>
</head>

<body>

	<?php
			 
			 print_r($_POST);

			$sql = "INSERT INTO customer_information (name,password,sex,number,address) VALUES ('{$_POST['name']}','{$_POST['password']}', '{$_POST['sex']}', '{$_POST['number']}','{$_POST['address']}')";
			 echo $sql;

			mysqli_query( $conn, $sql);

			mysqli_close( $conn );
	

	?>
	<a href="fetch_table.php">查看数据表</a>


</body>

</html>