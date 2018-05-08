<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>无标题文档</title>
<style type="text/css">

.ti {
	font-size: 18px;
	font-style: normal;
	font-weight: bold;
	
}
.as{
    margin-left:100px;
	margin-top:auto;
	}
</style>
</head>

<body>
<table width="1089" height="600" border="1" bgcolor="#33CCFF" align="center">
  <tr>
    <td height="65" colspan="2" class="ti" align="center">欢迎来到易读管理界面</td>
  </tr>
  <tr>
    <td width="242" height="368"><?php header("content-type:text/html;charset=utf-8"); include('daohan.php');?></td>
    <td width="831" bgcolor="#FFFFFF">
	<?php
header("Content-type:text/html;charset=utf-8");
$key=$_POST['textfield'];
$i=$_POST['spec'];
$link = mysqli_connect('localhost','web123','123','db_shop');//链接数据库
mysqli_set_charset($link,'utf8'); //设定字符集

if($i==0){
$sql1="select * from td_user where name='$key' or truename=$key";
      echo"<table border='1' align='center'>";
      echo" <tr bgcolor='#00CCCC'><td colspan='6'>用户信息</td></tr>";
      echo"<tr bgcolor='#CCCCCC'><td width='30'>id</td><td width='80'>用户名</td><td width='80'>密码</td><td width='80'>Email</td><td width='80'>联系方式</td><td width='80'>真实姓名</td></tr>";
       $result1=mysqli_query($link,$sql1);
      while($row = mysqli_fetch_array($result1)){
      echo"<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['pwd']."</td><td>".$row['email']."</td><td>".$row['tel']."</td><td>".$row['truename']."</td></tr>";
      }
      echo"</table>";
}
else if($i==1){
$sql2="select * from td_shangping where bookname='$key' or ibsn='$key' or publish='$key' or writer='$key' or type='$key'";
$result2=mysqli_query($link,$sql2);
      echo"<table border='1' align='center'>";
      echo" <tr bgcolor='#00CCCC'><td colspan='7'>商品信息</td></tr>";
      echo"<tr bgcolor='#CCCCCC'><td width='30'>id</td><td width='80'>书名</td><td width='80'>作者</td><td width='80'>出版社</td><td width='80'>IBSN</td><td width='80'>价格</td><td max-width='100'>简介</tr>";
      while($row = mysqli_fetch_array($result2)){
      echo"<tr><td>".$row['id']."</td><td>".$row['bookname']."</td><td>".$row['writer']."</td><td>".$row['publish']."</td><td>".$row['ibsn']."</td><td>".$row['price']."</td><td>".$row['abstract']."</td></tr>";
      }
      echo"</table>";
}
else{
$sql3="select * from message where title ='$key' or content like '$key%' or content like '%$key%' or content like '%$key'";
$result3=mysqli_query($link,$sql3);
      echo"<table border='1' align='center'>";
      echo" <tr bgcolor='#00CCCC'><td colspan='3'>评论信息</td></tr>";
      echo"<tr  bgcolor='#CCCCCC'><td width='30'>id</td><td width='50'>书名</td><td width='100'>评论</td></tr>";
      while($row = mysqli_fetch_array($result3)){
      echo"<tr><td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['content']."</td></tr>";
      }
      echo"</table>";     

}
?>
	</td>
  </tr>
</table>
</body>
</html>
