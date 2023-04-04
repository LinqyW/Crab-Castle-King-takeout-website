<!doctype html>
<?php 
session_start();//打开或者开启一个会话
require_once("conn.php");
?>
<html>

<head>
	<meta charset="utf-8">
	<title>客户登录</title>
</head>

<body>
	<pre>
		<?php
		// print_r( $_POST );
		$sql = "SELECT * FROM customer_information where name='{$_POST['name']}' and password='{$_POST['password']}' ";
		// echo $sql;
		$result = mysqli_query( $conn, $sql );

		$count = mysqli_num_rows( $result );  //查询行数，如果查询不到就输出
		if ( $count == 0 ) {
			echo "账号错误，查无此人";

		} else {
			while ( $row = mysqli_fetch_array( $result ) ) {
				// echo "\n商家姓名：",$row[ 'Merchantname' ] ;
				// echo "<br />";
				// echo"\n密码：",$row[ 'Passwords' ];
				// echo "<br />";
				// $_SESSION['ID'] = $row['ID'];
				$_SESSION['username'] = $row['name'];//建立一个会话
				$_SESSION['password'] = $row['password']; 
			}
		}
		mysqli_close( $conn );
		header( "location:main/head.php" );
		?>
	</pre>
	<!-- <a href="../form_insert.html">注册</a>  -->
</body>

</html>