<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="Reg.css"/> 
<style type="text/css">
/* .divform{
position: absolute;
width: 400px;
height: 400px;
text-align: center;
top: 50%;
left: 50%;
margin-top: -150px;
margin-left: -200px;
} */
</style>
</head>

<body>
    <p id="register">
        <h1>Register<h1>
        <form action="./reg_do.php" method="post" enctype="multipart/form-data" class="form">                     
            <input type="text" id="username" name="username" list="username" required="required" placeholder="用户名" class="input1"><br>
            <input type="password" id="password" name="password" required="required" placeholder="密码" class="input1"><br>
            <input type="password" id="repassword" name="repassword" required="required" placeholder="确认密码" class="input1"><br>
            <input type="text" id="nickname" name="nickname" required="required" placeholder="用户名称" class="input1"><br>
            <input type='button' value='头像'  OnClick='javascript:$("#heading").Click();' class="input3"/>
            <input id='heading' type='file' OnChange='javascript:xxx();' name="headimg" required="required" class="input4"/><br>
            <input type="submit" name="submit" id="submit" value="提交" class="input2">
            <input type="reset" value="重置" class="input2"><br>
            已有账号，请<a href="index.php">登录</a>
        </form>
    </p>
</body>
</html>

