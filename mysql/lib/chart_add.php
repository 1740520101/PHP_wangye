<?php
    require_once('../db/config.php');
    if(!$_SESSION['username']){
        exit('<script>alert("当前用户未登录");window.location.href="index.php"</script>');
    }
    $content = $_POST['co'];
    if(!$content){
        $return = array('code'=>0,'msg'=>"请填写内容");
        echo json_encode($return);
        exit;
    }
    $sql = "insert into chart(uid,content,addtime) value(".$_SESSION['uid'].",'".$content."',".time().")";
    $query = $db->query($sql);
    if($query){
        $return = array('code'=>1,'msg'=>"发表成功");
        echo json_encode( $return ); 
    }else{
        $return = array('code'=>0,'msg'=>"发表失败");
        echo json_encode($return);
    }