<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
.ti {
	font-size: 18px;
	font-style: normal;
	font-weight: bold;
	
}
-->
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
	  header("content-type:text/html;charset=utf-8");
	  $num_rec_per_page=10;
	  $link= mysqli_connect('localhost','web123','123','db_shop');
      mysqli_set_charset($link,'utf8'); 
	  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
      $start_from = ($page-1) * $num_rec_per_page; 
	  $sql="select * from td_user LIMIT $start_from, $num_rec_per_page";
      $result=mysqli_query($link,$sql);
	  echo"<table border='1' align='center'>";
	  echo" <tr bgcolor='#00CCCC'><td colspan='7'>用户信息</td></tr>";
	  echo"<tr bgcolor='#CCCCCC'><td width='30'>id</td><td width='80'>用户名</td><td width='80'>密码</td><td width='80'>Email</td><td width='80'>联系方式</td><td width='80'>真实姓名</td><td width='50'>操作</td></tr>";
	  while($row = mysqli_fetch_array($result)){
	  $ids=$row['id'];
	  echo"<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['pwd']."</td><td>".$row['email']."</td><td>".$row['tel']."</td><td>".$row['truename']."</td><td><a href='deluser.php?ids=$ids'>删除</a></td></tr>";
	  }
	  echo"</table>";
	         $sql_select="select * from td_user";
			 $rs_result= mysqli_query($link,$sql_select);
			 $total_records=mysqli_num_rows($rs_result);
			 $total_pages=ceil($total_records/$num_rec_per_page);
			 
			 echo "<a href='user.php?page=1'>".'|<'."</a> "; // 第一页

             for ($i=1; $i<=$total_pages; $i++) { 
             echo "<a href='user.php?page=".$i."'>".$i."</a> "; 
             }; 
             echo "<a href='user.php?page=$total_pages'>".'>|'."</a> "; // 最后一页
	 ?>
	</td>
  </tr>
</table>
</body>
</html>
