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
    <div>
  <table>
			<thead>
				<tr class="tr_line1" >
					<td>ID</td>
					<td>name</td>
					<td>sex</td>
					<td>age</td>
					<td>password</td>
          <td>manage</td>
				</tr>
			</thead>
			<tbody>

				<?php
        //echo $_SESSION['name'];
				$result = mysqli_query($conn, "SELECT * FROM waimaiyuan ");
				while ($row = mysqli_fetch_array($result)) {
				?>
        <tr class="tr_line2">
						<td><?php echo $row['ID'];                  ?> </td>
						<td>
							<?php echo $row['name']; ?>
						</td>
            <td>
							<?php echo $row['sex']; ?></td>
						<td> <?php echo $row['age'];        ?> </td>
            <td> <?php echo $row['password'];      ?> </td>
						<td>  <a href="zhuxiaowai.php?ID=<?php echo $row['ID']; ?>" class="tr">注销</a></td>
						
					</tr>
				<?php
        }
                ?>
                </table>
 </div>
</body>

</html>