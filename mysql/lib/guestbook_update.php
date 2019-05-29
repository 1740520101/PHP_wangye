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
        $id = $_POST['id'];
        if (!$comment){
            exit('<script>alert("请输入留言");history.back();</script>');
        }
        $sql = "update guestbook set comment= '".$comment."' where id=".$id." and uid = ".$_SESSION['uid'];
        $query = $db->query($sql);
        if($query){
            exit('<script>alert("编辑成功");window.location.href="guestbook.php";</script>');
        }else{
            exit('<script>alert("编辑失败");history.back();</script>');
        }
    ?>
</body>
</html>

