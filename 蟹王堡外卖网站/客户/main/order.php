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
	
	<title>更新个人信息</title>
	
</head>

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
		<li>
          <a href="head2.php" class="menuHover">探索订餐</a>
        </li>
      </ul>
    </div>
  <!-- 不一样 -->
  <script language="JavaScript">
		function time() {
			today = new Date();
			return (today.getFullYear(), "-", today.getMonth() + 1, "-", today.getDate(), " ", today.getHours(), ":", today.getMinutes());
		}
	</script>
		<?php
		 // echo $_SESSION['username'];
         // echo $_POST['dish_num'] ;
		 
		if (isset($_POST['dish_num'])) {
			$time = time();
			$t=(date("Y-m-d H:i:s", $time));
			// $a = $_POST['countt'];
			// $b = $_POST['danjia'];
			$al =  $_POST['countt'] * $_POST['danjia'];
			// $al=eval({$_POST['countt']}*{$_POST['danjia']});
			$sql = "INSERT INTO order_dishes (cus_name,dish_num,dish_name,dish_Merchantname,countt,danjia,zongjia,order_time,note) VALUES ('{$_SESSION['username']}','{$_POST['dish_num']}','{$_POST['dish_name']}','{$_POST['dish_Merchantname']}', '{$_POST['countt']}', '{$_POST['danjia']}','$al','$t','{$_POST['note']}')";
			mysqli_query($conn, $sql);
			echo "<h4>更新成功</h4>";
			echo "<h4><a href='head1.php'>订单完成</a></h4>";
		}
		$sql = "SELECT * FROM dishes Where dID= '{$_GET['dID']}'";  //查询ID并选择出所有包含该ID的关联数组
		//echo $sql;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		mysqli_close($conn);
		?>
	<div class="tent">
		<form method="post" action=" "> 
			</p>
			<p> 菜品编号:
				<input name="dish_num" type="text" value="<?php  echo  $row[ 'dID' ];   ?>" readonly>
			</p>
			<p> 菜品名:
				<input name="dish_name" type="text" value="<?php  echo  $row[ 'dname' ];   ?>" readonly>
			</p>
			<p> 
				<input name="dish_Merchantname" type="hidden" value="<?php  echo  $row[ 'Restaurant' ];   ?>" readonly>
			</p>
			<p> 份数:
				<input name="countt" type="text" value="1">
			</p>
			<p> 单价:
				<input type="text" name="danjia" value="<?php  echo  $row[ 'dprice' ];   ?>" readonly>
			</p>
			<p> 备注:
				<input type="text" name="note" value="">
			</p>
			<p>
				<input type="submit" name="submit" id="submit" value="保存">
			</p> 
		</form>
	</div>




</body>

</html>