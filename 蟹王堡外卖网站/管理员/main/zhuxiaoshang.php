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
            <?php if (isset($_SESSION['admin'])) { ?>
              <a href="update.php?admin=<?php echo $_SESSION['admin']; ?> " target="_top">修改个人信息</a>
            <?php } ?>
          </div>
          <div class="exit">
            <?php if (isset($_SESSION['admin'])) { ?>
              <a href="delete.php?admin=<?php echo $_SESSION['admin']; ?> " target="_top">注销账号</a>
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
          <a href="head.php">外卖员账号管理</a>
        </li>
        <li>
              <a href="head1.php">商家账号管理</a>
            </li>
            <li>
              <a href="head2.php">客户账号管理</a>
            </li>
      </ul>
    </div>
    <!-- 主页面 -->
    <div class="tent">
    <?php
			 
			 print_r($_GET);
     
			$sql = " delete from business  WHERE ID='{$_GET['ID']}' ";
			 echo $sql;
			 
			mysqli_query( $conn, $sql);

			mysqli_close( $conn);//改成information
	

	?>
  <?php echo "处理成功！"?>
    </div>
</body>

</html>