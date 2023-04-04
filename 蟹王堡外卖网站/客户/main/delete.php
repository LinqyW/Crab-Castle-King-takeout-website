
<?php
require_once("../conn.php"); //连接数据库 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="contain.css">
  <title>主页面</title>
  <style>
	  .aa{
       width:200px;
	   height: 200px;
	   margin:0 auto ;
	  }
	  .b1{
		  width:80px;
		  height:50px;
	  }
	  .b2{
		  width:80px;
		  height:50px;
	  }
  </style>
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
              <a href="update.php?name=<?php echo $_SESSION['username']; ?> " target="_top">修改个人信息</a>
            <?php } ?>
          </div>
          <div class="exit">
            <?php if (isset($_SESSION['username'])) { ?>
              <a href="delete.php?name=<?php echo $_SESSION['username']; ?> " target="_top">注销账号</a>
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
          <a href="head1.php" class="menuHover">订单管理</a>
        </li>
      </ul>
    </div>
  <!-- 不一样 -->
  <div class="tent">
  <pre>
	<?php
	//print_r( $_GET );
	//print_r( $_POST );

	if ( isset( $_POST[ 'submit' ] )&&($_POST[ 'submit' ]=="注销" )) {

		$sql = "delete from customer_information  WHERE name='{$_GET['name']}';";
		echo $sql;//输出语句验证
		mysqli_query( $conn, $sql );//执行
		unset( $_POST );//释放内存中的这个变量
	} else {

		$sql = "SELECT * FROM customer_information WHERE name='{$_GET['name']}';";
		//echo $sql;
		$result = mysqli_query( $conn, $sql );

		$row = mysqli_fetch_array( $result );

		?>

</pre>
	<form method="post" action="" class="aa">
		<input type="submit" name="submit" id="submit" class="b1" value="注销">

		<input type="submit" name="submit" id="submit" class="b2" value="取消">
		</p>
	</form>
	<?php
	}

	mysqli_close( $conn );
	?>
	</div>
  </body>

</html>


