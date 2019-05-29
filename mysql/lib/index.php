<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="Reg.css"/>
</head>
<body>
    <p id="Login">
        <h1>Login<h1>
        <form action="index_do.php" method="post" enctype="multipart/form-data">                     
            <input type="text" id="username" name="username" list="username" required="required" placeholder="用户名" class="input1"><br>
            <input type="password" id="password" name="password" required="required" placeholder="密码" class="input1"><br>
            <input type="submit" name="submit" id="submit" value="登录" class="input2">
            <a href="reg.php">注册</a>
            <a href="findpassword.php">忘记密码?</a>
        </form>
    </p>
</body>
</html>

