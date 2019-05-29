<?php 
    require_once('../db/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言添加</title>
</head>

<body>  
    <?php
        $comment = $_POST['comment'];
        if (!$comment){
            exit('<script>alert("请输入留言");history.back();</script>');
        }
        $sql = "insert into guestbook(uid,comment,addtime,ip)
        values('".$_SESSION['uid']."','".$comment."','".time()."','".$_SERVER['REMOTE_ADDR']."')";
        $query = $db->query($sql);
        if($query){
            exit('<script>alert("发表成功");history.back();</script>');
        }else{
            exit('<script>alert("发表失败");history.back();</script>');
        }
    ?>
</body>
</html>

