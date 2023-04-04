<?php
require_once("../conn.php");
session_start();
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>INSERT INTO dishes </title>
</head>

<body>

	<?php
			 
			 print_r($_POST);

			$sql = "INSERT INTO dishes (dID,dname, ddiscribe, dprice,Merchantname) VALUES ('{$_POST['dID']}','{$_POST['dname']}', '{$_POST['ddiscribe']}', '{$_POST['dprice']}'),'{$_SESSION['username']}'";
			 echo $sql;
			 
			mysqli_query( $conn, $sql);

			mysqli_close( $conn);
	

	?>
	<a href="form_upicture.php?dID='<?php echo $_POST['dID']?>'">上传图片</a></td>


</body>

</html>