<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
@session_start();
if ( isset( $_SESSION['username'] ) ) {
	echo "在线用户：" . $_SESSION[ 'username' ] ."&nbsp"."&nbsp"."&nbsp"."<a class=a1 href='logout.php'>退出</a>";?>
	<!-- <a href="update.php?Merchantname =?php //echo $_SESSION['username'];? ">修改个人信息</a> -->
	<?php
} else {
	echo "在线用户：" . "访客" . "&nbsp"."    <a href='../login/index.php'>登陆</a>";
}
?>
</body>
</html>


