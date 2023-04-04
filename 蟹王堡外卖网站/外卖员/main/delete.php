<!doctype html>
<?php 
require_once("../conn.php");
?>
<html>

<head>
	<meta charset="utf-8">
	<title>删除页面</title>
</head>

<body>
<pre>
	<?php
	//print_r( $_GET );
	//print_r( $_POST );

	if ( isset( $_POST[ 'submit' ] )&&($_POST[ 'submit' ]=="删除" )) {

		$sql = "delete from waimaiyuan  WHEREname='{$_GET['name']}';";
		echo $sql;//输出语句验证
		mysqli_query( $conn, $sql );//执行
		unset( $_POST );//释放内存中的这个变量
	} else {

		$sql = "SELECT * FROM waimaiyuan where name='{$_GET['name']}';";
		//echo $sql;
		$result = mysqli_query( $conn, $sql );

		$row = mysqli_fetch_array( $result );

		//echo $row[ 'ID' ] . " " . $row[ 'Restaurant' ] . " " . $row[ 'Merchantname' ] . " " . $row[ 'Passwords' ] . " " . $row[ 'age' ]. " " .$row[ 'sex' ];
//如果没有删除的话就把该ID的信息输出
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
	<a href="fetch_table.php">返回--查看数据表</a>

</body>

</html>