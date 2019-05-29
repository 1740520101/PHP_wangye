<?php
    require_once('../db/config.php');
    if(!$_SESSION['username']){
        exit('<script>alert("当前用户未登录");window.location.href="index.php"</script>');
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言</title>
<style>
    #comment{
        width:500px ;
        height:200px
    }
</style>
</head>
<body>
    <?PHP
        $id = intval($_GET['id']);
        $sql = "delete from guestbook where id=".$id." and uid = ".$_SESSION['uid'];
        $info = $db->query($sql);
        if($info){
            exit('<script>alert("删除成功");window.location.href="guestbook.php";</script>');
        }
    ?>
</body>
</html>