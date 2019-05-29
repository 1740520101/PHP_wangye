<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-3.3.1.js"></script>
<style>
    *{
        padding: 0;
        margin: 0;
    }
        #tabtitle{
            border:1px #000 solid;
            height:30px;
            width:500px;
        }
        #tabtitle > li{
            height:30px;
            width:80px;
            float:left;
            line-height:30px;
        }
        #tabtitle > .active{
            display:block;
            background: red;
            color:#fff;
        }
        #tabcontent{
            border:1px #000 solid;
            height:300px;
            width:500px;
            
        }
        #tabcontent > li{
            display:none;
        }
        #tabcontent > .active1{
            display:block;
        }
</style>
<title>Jquery</title>
</head>
<body>
    <script>
        $(function(){
            $("#tabtitle>li").mouseover(function(){
                $("#tabtitle>li").removeClass("active");
                $(this).addClass("active");
                index = $(this).index();
                /* $("#tabcontent>li").hide("active1"); */
                $("#tabcontent>li").removeClass("active1");
                $("#tabcontent>li").eq(index).addClass("active1");
               /*  $(".active1").fadeIn(3000); */
            });
        })
    </script>
    <ul id="tabtitle">
        <li class="active">tab1</li>
        <li>tab2</li>
        <li>tab3</li>
        <li>tab4</li>
    </ul>
    <ul id="tabcontent">
        <li class="active1">content1</li>
        <li>content2</li>
        <li>content3</li>
        <li>content4</li>
    </ul>
</body>
</html>