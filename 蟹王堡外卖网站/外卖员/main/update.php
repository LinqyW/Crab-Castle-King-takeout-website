<?php 
require_once("../conn.php");
?>
<!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<title>更新</title>
</head>

<body>
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
	<pre>
		<?php
		 //print_r( $_GET );
		// print_r( $_POST );

        //更新外卖员基本信息
		if ( isset( $_POST[ 'name' ] ) ) {
			$sql = "UPDATE waimaiyuan SET name = '{$_POST['name']}',password = '{$_POST['password']}',sex = '{$_POST['sex']}',age = '{$_POST['age']}'WHERE ID = '{$_POST['ID']}';";
			 	//echo $sql,"\n"; //更新语句，前提条件是Merchantname存在，等于传输值
			mysqli_query( $conn, $sql );
			echo"<h4>更新成功</h4>";
			echo"<h4><a href='fetch_table.php'>返回--查看数据表</a></h4>";
		}
		$sql = "SELECT * FROM information where name= '{$_GET['name']}'";  //查询ID并选择出所有包含该ID的关联数组
		 // echo $sql;
		$result = mysqli_query( $conn, $sql );
		$row = mysqli_fetch_array( $result );
		mysqli_close( $conn );
		?>
	</pre>
		<div>
		<form method="post" action="">   
			<!-- 该行的初始值 -->
			</p>
			   <p> ID:
				<input name="ID" type="text" value="<?php  echo  $row[ 'ID' ];   ?>" readonly>  
				</p> 
				<p> name:
					<input name="name" type="text" value="<?php  echo  $row[ 'name' ];   ?>">
				</p>
				<p> sex(:
					<input type="text" name="sex" value="<?php  echo  $row[ 'sex' ];   ?>">
				</p>
				<p> age:
					<input type="text" name="age" value="<?php  echo  $row[ 'age' ];   ?>">
				</p>
				<p> password:
					<input name="Password" type="password"   value="<?php  echo  $row[ 'password' ];   ?>">
				</p>
				<p>
					<input type="submit" name="submit" id="submit" value="保存">
				</p>
		</form>
		</div>
		


</body>

</html>

