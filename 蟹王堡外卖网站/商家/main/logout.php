<?php
session_start();
session_destroy();
?>
<!-- 退出登录(服务器)时就要销毁数据,销毁会话文件 -->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<body>
<?php header( "location:../index.php" );?>
</body>
</html>