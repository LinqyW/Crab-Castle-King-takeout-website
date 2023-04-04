<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录页面</title>
</head>
<link rel="stylesheet" href="login.css">
<body style="background-color:#fff;">
<header class="top_header" >
  <div class="w1200 clearfix top_header_content">
    <a href="javascript:;" class="header_logo ">蟹堡王外卖匠人之王</a>
  </div>
</header>
 <div class="login_box">
     <div id=sidebar>
         <p class=login_input_title > 
         <a href="../商家部分/index.php" class="alogin">商家登录</a> 
         <a href="../客户部分/index.php"  class="alogin">用户登录 </a>
         <a href="index.php"  class="alogin">外卖员登录</a></p>
     <?php include_once("form_login.html")    ?>  
     </div>
</div> 




</body>
</html>