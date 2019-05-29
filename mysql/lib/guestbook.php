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
        height:200px;
        background-color:transparent; 
        border:solid 5px black; 
        border-radius:20px; 
        resize:none;
        font-size:30px;
        color:black;
        font-weight:900
    }

</style>
</head>
<body style="background-image:url(temp.jpg); background-size:100%,100%; background-attachment: fixed;">
   欢迎你:<?php 
       echo $_SESSION['nickname']
   ?>
   <a href="chart.php">进入聊天室</a>
   <a href="quit.php">退出</a>
   <div align="center">
        <h1>
        留言
        <h1>
        <table width="1000px" border="1">
          <tr>
            <td width="72">用户名</td>
            <td width="412">留言内容</td>
          </tr>
          <?php 
            $pagesize = 6;
            //确定页数p参数
            @$p = $_GET['p']?$_GET['p']:1;
            //数据指针
            $offset = ($p-1)*$pagesize;
            //查询本页现实的数据
            $sql = "select * from guestbook,userlist where guestbook.uid=userlist.uid order by addtime desc limit $offset,$pagesize";
            $list = $db->getRows($sql);
            //循环输出
            /* $sql = "select * from guestbook,userlist where guestbook.uid=userlist.uid order by addtime desc"; */
            /* $list = $db->getRows($sql); */
            foreach($list as $k => $one){
          ?>
          <tr>
            <td>
                <img src="<?php echo $one['headimg'];?>" 
                    width="100px" />
                <br>
                <?php echo $one['nickname'];?>
            </td>
            <td>
                <?php echo $one['comment'];?>
                <div style="text-align:right;">
                    <?php echo date("Y-m-d H:i:s",$one['addtime']);
                    ?>
                    <?php 
                        if($one['uid']==$_SESSION['uid']){
                    ?>
                            <a href="guestbook_edit.php?id=<?php echo $one['id'] ?>">编辑</a>
                            <a href="guestbook_delete.php?id=<?php echo $one['id'] ?>">删除</a>
                        <?php } ?>
                </div>
            </td>
          </tr>
            <?php } ?>
        </table>
    </div>
    <div align="center">
        <?php 
            //分页代码
            //计算留言总数
            $sql = "select count(*) as count from guestbook,userlist where guestbook.uid=userlist.uid";
	        $lists = $db->getRows($sql);
            $lists = $lists[0];
	        //计算总的页数
	        $pagenum = ceil($lists['count']/$pagesize);
            echo '共',$lists['count'],'条留言';
            echo '<br>';
            
            echo '<a href="guestbook.php?p=1">首页</a>';
            echo '  ';
            echo '<a href="guestbook.php?p=',$p==1?1:($p-1),'">上一页</a>';
            echo '  ';
	        //循环输出个页数及链接
	        if($pagenum>=1){
		        for($i = 1;$i<=$pagenum;$i++){
			        if($i == $p){
				        echo '[',$i,']';
                        echo '  ';
			        }else{
                        echo  ' <a href="guestbook.php?p=',$i,'">',$i,'</a>';
                        echo '  ';
			        }
		        }
            }
            echo '<a href="guestbook.php?p=',$p==$pagenum?$pagenum:($p+1),'">下一页</a>';
            echo '  ';
            echo '<a href="guestbook.php?p=',$pagenum,'">尾页</a>';
        ?>
    </div>
    <div align="center">
        <form action="guestbook_add.php" method="post" enctype="multipart/form-data">  
            <textarea type="text" id="comment" name="comment" placeholder="开通超级会员发表5倍经验"></textarea><br>               
            <input type="submit" name="submit" id="submit" value="发表">
        </form>
    </div>
</body>
</html>