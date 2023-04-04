<HTML>

    <HEAD>
        <TITLE> 头像上传 </TITLE>
    
        <meta charset="UTF-8">
    </HEAD>
    
    <body>
          <?php echo $_GET['dID'];?>
        头像上传
        <FORM enctype="multipart/form-data" METHOD="post" ACTION="form_upicture_upload.php">
            <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="5000000"><p>
            <INPUT TYPE="hidden" name="paths" value="<?php echo $_GET['dID']?>"> 
            <!-- 这句没问题 -->
            请输入要上传的头像的文件名:<BR>
            <input type="file" name="file" size=30>
            <INPUT TYPE="submit" value="上传照片" name="submitup">
        </FORM>
    
    </BODY>
    
    </HTML>