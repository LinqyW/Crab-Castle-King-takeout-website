<?php
require_once("../conn.php");
?>
<!doctype html>

<html>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="contain.css">
<link rel="stylesheet" href="fetch_dis.css">
<title>更新/完善个人信息</title>

</head>
<!--      头部 -->

<body style="width: 100%; position: relative;">
	<div class="header-box">
		<div class="header">
			<div class="content">
				<a class="logo">
					<img src="main.image/logo.png">
				</a>
				<div class="right-side">
					<div class="name">
						<?php
						include("onlineuser.php");
						?>
					</div>
					<div class="message">
						<div class="txt">消息</div>
					</div>
					<div class="changePwd">
						<?php if (isset($_SESSION['username'])) { ?>
							<a href="update.php?Merchantname=<?php echo $_SESSION['username']; ?> " target="_top">修改个人信息</a>
						<?php } ?>
					</div>
					<div class="exit">
						<?php if (isset($_SESSION['username'])) { ?>
							<a href="delete.php?Merchantname=<?php echo $_SESSION['username']; ?> " target="_top">注销账号</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 左边页面 -->
	<div class="contain">
		<div class="nav">
			<ul>
				<li>
					<a href="head.php">主页</a>
				</li>
				<li>
					<a href="" class="menuHover">管理</a>
					<ul class="menuHover">
						<li>
							<a href="#订单管理">订单管理</a>
						</li>
						<li>
							<a href="head1.php">菜品管理</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- 不一样 -->
		<!-- <style>
		div{
			width: 30em;
			height: 25em;
			background-image:url('yemian/s.jpg') ;
			background-size: 30em,25em;
			border: 2px solid #0e1625;
			text-indent:20px ;
		}
		input {
	font-size: 11pt;
    font-family: 'Microsoft YaHei',Georgia, 'Times New Roman', Times, serif;
	border-style: none;

}
   p{
	   font-weight: 600;
	   font-style: italic;
   }
	</style> -->
		<div class="tent">
			<pre>
		<?php
		//print_r( $_GET );
		// print_r( $_POST );


		if (isset($_POST['Merchantname'])) {
			$sql = "UPDATE business SET Restaurant = '{$_POST['restaurant']}', Merchantname = '{$_POST['Merchantname']}',Passwords = '{$_POST['Passwords']}',age = '{$_POST['age']}',sex = '{$_POST['sex']}',baddress= '{$_POST['baddress']}' WHERE ID = '{$_POST['ID']}';";
			//echo $sql,"\n"; //更新语句，前提条件是Merchantname存在，等于传输值
			mysqli_query($conn, $sql);
			echo "<h4>更新成功</h4>";
			echo "<h4><a href='fetch_table.php'>返回--查看数据表</a></h4>";
		}
		$sql = "SELECT * FROM business where Merchantname= '{$_GET['Merchantname']}'";  //查询ID并选择出所有包含该ID的关联数组
		// echo $sql;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		mysqli_close($conn);
		?>
	</pre>
			<div>
			<?php $path = $row[	 'paths'	];?>
			<?php echo "<img src= $path height=100>" ?>
				<form method="post" action="">
					<!-- 该行的初始值 -->
					</p>
					<p> ID:
						<input name="ID" type="text" value="<?php echo  $row['ID'];   ?>" readonly>
					</p>
					<p> Restaurant(餐馆):
						<input name="restaurant" type="text" value="<?php echo  $row['Restaurant'];   ?>">
					</p>
					<p> Merchantname(商家名字):
						<input name="Merchantname" type="text" value="<?php echo  $row['Merchantname'];   ?>">
					</p>
					<p> Password（密码）:
						<input name="Passwords" type="password" value="<?php echo  $row['Passwords'];   ?>">
					</p>
					<p> age(年龄):
						<input type="text" name="age" value="<?php echo  $row['age'];   ?>">
					</p>
					<p> sex(性别):
						<input type="text" name="sex" value="<?php echo  $row['sex'];   ?>">
					</p>
					<p> 商家地址:
						<input type="text" name="baddress" value="<?php echo  $row['baddress'];   ?>">
					</p>
					<p>
						<input type="submit" name="submit" id="submit" value="保存">
					</p>
				</form>
			</div>
		</div>


</body>

</html>