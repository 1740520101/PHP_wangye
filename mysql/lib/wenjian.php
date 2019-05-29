<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文件</title>
</head>
<body>
    <!-- <?php 
        if(file_exists('text.text')){
            $file = fopen('text.text','a+');
        }else{
            $file = fopen('text.text','w+');
        }
       $info = fgets($file);
       $info = 1+$info;
       $file = fopen('text.text','w+');
       fwrite($file,$info);
       fclose($file);
       echo $info;
    ?> -->
    <form action="" method="post" enctype="multipart/form-data" name="forml" id="forml">
            <label for="fileFile">File</label>
            <input type="file" name="img" id="img">
            <input type="submit" name="submit" id="submit" value="提交">
    </form>
    <?php 
    /* if($_FILES["img"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["img"]["error"] . "<br />";
    }else{
        $img = $_FILES['img'];
        $ext = substr($img['name'],
        strrpos($img['name'],'.'));//获取文件后缀名
        echo $ext;
        $newfilename = date("YmdHis").rand(1000,9999).$ext;
        move_uploaded_file($img['tmp_name'],$newfilename);
    } */
    // if(file_exists('img')){
        @$img = $_FILES['img'];
        if($img){
            require_once('wenjianClass.php');
            $file = new wenjianClass();
            $info = $file->upload($img);
            print_r($info);
        }
    // }else{
    //     echo 'kkkk';
    // }
    exit;

    ?>
</body>
</html>

