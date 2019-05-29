<?php 
    require_once('../db/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册处理</title>
</head>

<body>  
    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $nickname = $_POST['nickname'];
        if (!$username){
            exit('<script>alert("请输入用户名");history.back();</script>');
        }else
        if (!$password){
            exit('<script>alert("请输入密码");history.back();</script>');
        }else
        if (!$repassword){
            exit('<script>alert("请输入密码");history.back();</script>');
        }else 
        if($repassword!=$password){
            exit('<script>alert("两次输入密码不一致");history.back();</script>');
        }else
        if (!$nickname){
            exit('<script>alert("请输入名称");history.back();</script>');
        }

        $sql = "select * from userlist where username = '".$username."'";
        $userinfo = $db->getRow($sql);
        if($userinfo){
            exit('<script>alert("用户名已存在");history.back();</script>');
        }
        $img = $_FILES['headimg'];
        if($img){
            $file = new wenjianClass();
            $info = $file->upload($img);
        }else{
            /* $info['url'] = ''; */
            exit('<script>alert("请选择头像");history.back();</script>');
        }
        $sql = "insert into userlist(username,password,nickname,headimg,regtime,regip)
        values('".$username."','".md5($password)."','".$nickname."','".$info['url']."','".time()."','".$_SERVER['REMOTE_ADDR']."')";
        $query = $db->query($sql);
        if($query){
            exit('<script>alert("注册成功,请登录");window.location.href="index.php"</script>');
        }else{
            exit('<script>alert("注册失败");history.back();</script>');
        }
    ?>
</body>
</html>

