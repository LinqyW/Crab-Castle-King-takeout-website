function phone(){
    var phoneReg=/^1[3-9][0-9]{9}$/;
    var phonenum=document.getElementById("number").value;
    var re=phoneReg.test(phonenum);
    if(!re)
    {
        alert("请输入正确的号码！")
        document.getElementById("number").value="";
    }
}
function cname(){
 var nameReg=/^(?=.*[a-zA-Z]+)(?=.*[0-9]+)[a-zA-Z0-9]+$/;
 var name=document.getElementById("name").value;
 if(!nameReg.test(name)||name.length<6){
    alert("请输入正确格式的用户名！")
    document.getElementById("name").value="";
 }
}
function checkpassword() {
var password = document.getElementById("password1").value;
var repassword = document.getElementById("password2").value;
if(password!=repassword){
    alert("两次输入密码不一致，请重新输入！")
    document.getElementById('password1').value = "";
    document.getElementById('password2').value = "";
}
}

cname();
phone();
checkpassword();