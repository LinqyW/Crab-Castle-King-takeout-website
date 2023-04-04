<!doctype html>
<?php
require_once("./conn.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
</head>
<body>



<PRE>

<?php
print_r($_POST);
//$path = $_POST['ACCOUNT'];
//echo $path;
//print_r($_FILES);

// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        $path='../main.image/';
        $dest_file=$path. $_FILES["file"]["name"];
		if (file_exists($dest_file))
		{
			echo $_FILES["file"]["name"] . " 文件已经存在。 ";
		}
		else
		{
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
			move_uploaded_file($_FILES["file"]["tmp_name"], $dest_file);
			echo "文件存储在: " . $dest_file;
            //把照片保存的地址信息写入到数据库中
            $path = $_POST['paths'];
            echo $path;
            $sql = " UPDATE dishes SET dpath = '$dest_file' 
			WHERE dID = $path; ";

            echo "\r\n";//换行符
            echo "头像上传成功！";
            
            $result = mysqli_query( $conn, $sql );

            mysqli_close( $conn );
		}
	}
}
else
{
	echo "这是非法的文件格式";
}

?>

</PRE>
<a href="../head.php">返回主页</a>
</body>
</html>