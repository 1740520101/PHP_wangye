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
<script src="../Javascripts/jquery-3.3.1.js"></script>
<script>
    $(function(){
        $("#sendbt").click(function(){
            var content = $("#content").val();
            if(!content){
                alert("请输入聊天内容");
                return;
            }
            $.ajax({
                url:'chart_add.php',
                type:"POST",
                dataType:'json',
                data:{
                    co:content
                },
                success:function(data){
                    if(data.code==1){
                        $("#content").val('');
                        alert(data.msg);
                    }else{
                        alert(data.msg);
                    }
                },
                error:function(){
                    alert("系统错误");
                }
            });
        });
    }); 
</script>
<style>
    div{
        width:500px ;
        height:318px;
        position:absolute;  
        left:50%;  
        top:50%;  
        margin:-159px 0 0 -250px 
    }
    #content{
        width:500px ;
        height:200px;
        background-color:transparent; 
    }
</style>
</head>
<body style="background-image:url(temp.jpg); background-size:100%,100%; background-attachment: fixed;">
<div align="left">
  <table width="500" height="318" border="2">
    <tr>
      <td height="226" colspan="2">&nbsp;</td>
      <td width="160" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="224" height="81"><label>
        <textarea name="content" id="content" cols="45" rows="5"></textarea>
      </label></td>
      <td width="92" align="center"><label>
        <input type="submit" name="sendbt" id="sendbt" value="提交" />
      </label></td>
    </tr>
  </table>
</div>
</body>
</html>