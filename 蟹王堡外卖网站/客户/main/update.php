
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
	 .ff{
		 padding: 0;
		 width:300px;
		 height:400px;
		 margin:80px auto;
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
        <li>
          <a href="head2.php" class="menuHover">探索订餐</a>
        </li>
      </ul>
    </div>
  <!-- 不一样 -->
  <div class="tent">
  <pre>
		<?php

		if ( isset( $_POST[ 'name' ] ) ) {
			$sql = "UPDATE customer_information SET name = '{$_POST['name']}', password = '{$_POST['password']}',sex = '{$_POST['sex']}',number = '{$_POST['number']}',address = '{$_POST['address']}'WHERE id = '{$_POST['id']}';";
			 	//echo $sql,"\n"; //更新语句，前提条件是Merchantname存在，等于传输值
			mysqli_query( $conn, $sql );
			echo"<h4>更新成功</h4>";
			//echo"<h4><a href='fetch_table.php'>返回--查看数据表</a></h4>";
		}
		$sql = "SELECT * FROM customer_information where name= '{$_GET['name']}'";  //查询ID并选择出所有包含该ID的关联数组
		 // echo $sql;
		$result = mysqli_query( $conn, $sql );
		$row = mysqli_fetch_array( $result );
		mysqli_close( $conn );
		?>
	</pre>
		<div>
		<form method="post" action="" class="ff">   
			<!-- 该行的初始值 -->
			</p>
			   <p> ID:
				<input name="id" type="text" value="<?php  echo  $row[ 'id' ];   ?>" readonly>  
				</p> 
				<p> 用户名:
					<input name="name" type="text" value="<?php  echo  $row[ 'name' ];   ?>">
				</p>
				<p> 密码:
					<input name="password" type="password"   value="<?php  echo  $row[ 'password' ];   ?>">
				</p>
				<p> 性别:
					<input type="text" name="sex" value="<?php  echo  $row[ 'sex' ];   ?>">
				</p>
				<p> 联系方式:
					<input type="text" name="number" value="<?php  echo  $row[ 'number' ];   ?>">
				</p>
				<p> 地址:
					<input type="text" name="address" value="<?php  echo  $row[ 'address' ];   ?>">
				</p>
				<p>
					<input type="submit" name="submit" id="submit" value="保存">
				</p>
		</form>
		</div>
	</div>
  </body>

</html>

