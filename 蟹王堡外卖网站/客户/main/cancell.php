<!doctype html>
<?php 
require_once("../conn.php");
?>
<html>

<head>
	<meta charset="utf-8">
	<title>取消订单</title>
</head>

<body>
<pre>
	<?php
	//print_r( $_GET );
	//print_r( $_POST );

	if ( isset( $_POST[ 'submit' ] )&&($_POST[ 'submit' ]=="删除" )) {

		$sql = "delete from order_dishes  WHERE id='{$_GET['id']}';";
		echo $sql;//输出语句验证
		mysqli_query( $conn, $sql );//执行
		unset( $_POST );//释放内存中的这个变量
	} else {

		$sql = "SELECT * FROM order_dishes WHERE id='{$_GET['id']}';";
		//echo $sql;
		$result = mysqli_query( $conn, $sql );

		$row = mysqli_fetch_array( $result );

		?>

</pre>
	<form method="post" action="">
		<input type="submit" name="submit" id="submit" value="删除">

		<input type="submit" name="submit" id="submit" value="取消">
		</p>
	</form>
	<?php
	}

	mysqli_close( $conn );
	?>

</body>

</html>