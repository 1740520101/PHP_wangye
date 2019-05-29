<?php 
    require_once('../db/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录处理</title>
</head>

<body>  
    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!$username){
            exit('<script>alert("请输入用户名");history.back();</script>');
        }else
        if (!$password){
            exit('<script>alert("请输入密码");history.back();</script>');
        }
        $sql = "select * from userlist where username = '".$username."'";
        $userinfo = array();
        $userinfo = $db->getRow($sql);
        if($userinfo['username']==$username&&$userinfo['password']==md5($password)){
            $_SESSION['uid'] = $userinfo['uid'];
            $_SESSION['username'] = $userinfo['username'];
            $_SESSION['password'] = $userinfo['password'];
            $_SESSION['nickname'] = $userinfo['nickname'];
            exit('<script>alert("登录成功");window.location.href="guestbook.php"</script>');
        }else{
            exit('<script>alert("用户名或密码错误");history.back();</script>');
        }
    ?>
</body>
</html>

