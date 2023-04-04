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
    <ul >
      <li>
        <a href="head.php" >主页</a>
      </li>
      <li >
        <a href="" class="menuHover">管理</a>
        <ul class="menuHover">
          <li>
            <a  href="head2.php" >订单管理</a>
          </li>
          <li>
            <a  href="head1.php" >菜品管理</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- 不一样 -->
  <div class="tent">
    <div>
  <table>
			<thead>
				<tr class="tr_line1" >
					<td>菜品编号</td>
					<td>图片</td>
					<td>菜品名字</td>
					<td>菜品描述</td>
					<td>菜品价格</td>
					<td>option1</td>
					<td>option2</td>
					<td>option3</td>
				</tr>
			</thead>
			<tbody>

				<?php
        $n=0;
				$result = mysqli_query($conn, "SELECT * FROM dishes Where Merchantname='{$_SESSION['username']}'");
				while ($row = mysqli_fetch_array($result)) {
				?>
        <tr class="tr_line2">
						<td><?php echo $row['dID'];                  ?> </td>
						<td>
							<?php $path = $row['dpath']; ?>
							<?php echo "<img src= $path height=100>" ?>
						</td>
						<td> <?php echo $row['dname'];      ?> </td>
						<td> <?php echo $row['ddiscribe'];        ?> </td>
						<td> <?php echo $row['dprice'];              ?> </td>
					  <td><a href="update_dis.php?dID=<?php echo $row['dID']; ?>">修改菜品信息</a></td> 
            <td><a href="delete_dish.php?dID=<?php echo $row['dID']; ?>">删除菜品</a> </td> 
						<td><a href="#upicture1.php?dID=<?php echo $row['dID']; ?> ">上传图片</a></td> 
					</tr>
				<?php
				}
                ?>
            <a href="inser_dish.php">新增菜品信息</a>
 </div>
  </div>
  
  </body>

</html>


