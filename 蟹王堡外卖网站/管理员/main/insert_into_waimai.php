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
            <?php if (isset($_SESSION['name'])) { ?>
              <a href="update.php?name=<?php echo $_SESSION['name']; ?> " target="_top">修改个人信息</a>
            <?php } ?>
          </div>
          <div class="exit">
            <?php if (isset($_SESSION['name'])) { ?>
              <a href="delete.php?name=<?php echo $_SESSION['name']; ?> " target="_top">注销账号</a>
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
    <!-- 主页面 -->
    <div class="tent">
    <?php
			 
			 print_r($_GET);
     echo $_SESSION['name'];
			$sql = "UPDATE order_dishes SET wai_name  = '{$_SESSION['name']}'  WHERE id ={$_GET['id']} ";
			 echo $sql;
			 
			mysqli_query( $conn, $sql);

			mysqli_close( $conn);//改成information
	

	?>
  <?php echo "订单成功！"?>
    </div>
</body>

</html>