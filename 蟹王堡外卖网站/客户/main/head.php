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
  <link rel="stylesheet" href="fetch_dis.css">
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
<!-- 主页面 -->
<div class="tent">
    <!-- 这里开始输出！！耶耶 -->
    <?php
    $n=1;
    $result = mysqli_query($conn, "SELECT * FROM business ");
    while ($row = mysqli_fetch_array($result)) {
    ?>
    <?php if($n%4==1)
    echo "<div class='tent1'>"; ?>
          <div class="tent0">
            <div class="pic">
              <?php $path = $row['paths']; ?>
              <?php echo "<img src= $path height=100>" ?>
            </div>
            <div class="text1">
              <h3><?php echo $row['ID']; ?>
             <?php echo $row['Restaurant']; ?></h3>
             <h5>&nbsp;</h5>
              <h5>地址：<?php echo $row['baddress']; ?></h5>
              <a href="head2.php?Merchantname=<?php echo $row['Merchantname']; ?>">进入店铺</a>
            </div>
        </div>
        <?php if($n%4==0)
    echo "</div>"; 
    $n++;
    ?>
        <?php }  ?>
     </div>