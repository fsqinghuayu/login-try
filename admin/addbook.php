<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>上传</title>
<style type="text/css">
<!--
.ti {
	font-size: 18px;
	font-style: normal;
	font-weight: bold;
	
}
.bg{
    width:300px;
    background-color:#CCCCCC;
    margin-left:200px;
    margin-top:0px;
    padding:30px;"
	}
-->
</style>
<script>  
function setImagePreview()   
{  
        var docObj=document.getElementById("file");   
        var imgObjPreview=document.getElementById("preview");  
        if(docObj.files &&    docObj.files[0])  
        {  
            //火狐下，直接设img属性  
            imgObjPreview.style.display = 'block';  
            imgObjPreview.style.width = '200px';  
            imgObjPreview.style.height = '200px';                      
           //imgObjPreview.src = docObj.files[0].getAsDataURL();  
           //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式    
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);  
        }  
        else  
        {  
            //IE下，使用滤镜  
            docObj.select();  
            var imgSrc = document.selection.createRange().text;  
            var localImagId = document.getElementById("localImag");  
            //必须设置初始大小  
            localImagId.style.width = "300px";  
            localImagId.style.height = "120px";  
            //图片异常的捕捉，防止用户修改后缀来伪造图片  
            try  
            {  
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";  
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;  
            }  
            catch(e)  
            {  
                alert("您上传的图片格式不正确，请重新选择!");  
                return false;  
            }  
                imgObjPreview.style.display = 'none';  
                document.selection.empty();  
         }  
         return true;  
 }  
</script> 
</head>

<body>
<table width="1089" height="600" border="1" bgcolor="#33CCFF" align="center">
  <tr>
    <td height="65" colspan="2" class="ti" align="center">欢迎来到易读管理界面</td>
  </tr>
  <tr>
    <td width="242" height="368"><?php header("content-type:text/html;charset=utf-8"); include('daohan.php');?></td>
    <td width="831" bgcolor="#FFFFFF">
	<form style=" width:300px;
    background-color:#CCCCCC;
    margin-left:200px;
    margin-top:0px;
    padding:30px;" method="post" name="myform" enctype="multipart/form-data" action="">
 <div class="m" align="center">添加图书</div>
  <br/><br/>
<label>书  名:<input type="text" name="bookname"></label>
<br/><br/>
<label>作  者:<input type="text" name="writer"></label>
<br/><br/>
<label>出版社:<input type="text" name="publish" size="18"></label>
<br/><br/>
<label>IBSN:<input type="text" name="ibsn" /></label>
<br/><br/>
<label>价  格:<input type="text" name="price" /></label>
<br/><br/>
<label>简  介<textarea name="abstract" cols="17">请输入简介</textarea></label>
<br/><br/>
封  面<input type="file" name="file" id="file" onchange="javascript:setImagePreview();"> 
<br/>
<button type="submit" name="submit">上传</button>
</form>
<?php  
    session_start();  
    $_SESSION["userid"]="admin";  
    if (1)//这个地方可以填写上传文件的限制，比如格式大小要求等，为了方便测试，这里没有写上传限制。  
    {  
        if ($_FILES["file"]["error"] > 0)  
        {  
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";//获取文件返回错误  
        }  
        else  
        {  
            //打印文件信息  
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";//获取文件名  
            echo "Type: " . $_FILES["file"]["type"] . "<br />";//获取文件类型  
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";//获取文件大小  
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";//获取文件临时地址  
              
            //自定义文件名称  
            $array=$_FILES["file"]["type"];  
            $array=explode("/",$array);  
            $newfilename="new_name";//自定义文件名（测试的时候中文名会操作失败）  
            $_FILES["file"]["name"]=$newfilename.".".$array[1];  
              
            if (!is_dir("upload/".$_SESSION["userid"]))//当路径不穿在  
            {  
                mkdir("upload/".$_SESSION["userid"]);//创建路径  
            }  
            $url="upload/".$_SESSION["userid"]."/";//记录路径  
            if (file_exists($url.$_FILES["file"]["name"]))//当文件存在  
            {  
                echo $_FILES["file"]["name"] . " already exists. ";  
            }  
            else//当文件不存在  
            {  
                $url=$url.$_FILES["file"]["name"];  
                move_uploaded_file($_FILES["file"]["tmp_name"],$url);  
                echo "Stored in: " . $url;  
            }  
        }  
     }  
    else  
    {  
        echo "Invalid file";  
    }  
 
if (isset($_POST["submit"])){
$link = mysqli_connect('localhost', 'web123', '123', 'db_shop');
	mysqli_set_charset($link,'utf8');
	$name=$_POST['bookname'];
	$writer=$_POST['writer'];
	$publish=$_POST['publish'];
	$ibsn=$_POST['ibsn'];
	$price=$_POST['price'];
	$abstract=$_POST['abstract'];
    $sql="insert into td_shangping(bookname,writer,publish,ibsn,price,abstract,photo)
	      values ('$name','$writer','$publish','$ibsn','$price','$abstract','$url')";
    mysqli_query($link,$sql);}	
?>	
	</td>
  </tr>
</table>
</body>
</html>