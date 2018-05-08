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
.autocut{ 
overflow:hidden; 
white-space:nowrap; 
text-overflow:ellipsis; 
-o-text-overflow:ellipsis; 
-icab-text-overflow: ellipsis; 
-khtml-text-overflow: ellipsis; 
-moz-text-overflow: ellipsis; 
-webkit-text-overflow: ellipsis; 
} 
.autocut:hover 
{ 
overflow:visible; 
white-space:normal; 
word-wrap: break-word; 
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
    <td max-width="831" bgcolor="#FFFFFF">
	<?php 
	  header("content-type:text/html;charset=utf-8");
	  $num_rec_per_page=10;
	  $link= mysqli_connect('localhost','web123','123','db_shop');
      mysqli_set_charset($link,'utf8'); 
	  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
      $start_from = ($page-1) * $num_rec_per_page; 
	  $sql="select * from td_shangping LIMIT $start_from, $num_rec_per_page";
      $result=mysqli_query($link,$sql);
	  echo"<div class='autocut'>";
	  echo"<table border='1' align='center' style='table-layout:fixed;'>";
	  echo" <tr bgcolor='#00CCCC'><td colspan='8'>商品信息</td></tr>";
	  echo"<tr bgcolor='#CCCCCC'><td width='30'>id</td><td width='80'>书名</td><td width='80'>作者</td><td width='80'>出版社</td><td width='80'>IBSN</td><td width='80'>价格</td><td width='100' class='aotocut'>简介</td><td width='80'>操作</td></tr>";
	  while($row = mysqli_fetch_array($result)){
	  $ids=$row['id'];
	  echo"<tr><td>".$row['id']."</td><td>".$row['bookname']."</td><td>".$row['writer']."</td><td>".$row['publish']."</td><td>".$row['ibsn']."</td><td>".$row['price']."</td><td>".$row['abstract']."</td><td><a href='delshangping.php?ids=$ids'>删除</a>&nbsp<a href='resetbook.php?ids=$ids'>修改</a></td></tr>";
	  }
	  echo"</table></div>";
	  $sql_select="select * from td_shangping";
			 $rs_result= mysqli_query($link,$sql_select);
			 $total_records=mysqli_num_rows($rs_result);
			 $total_pages=ceil($total_records/$num_rec_per_page);
			 
			 echo "<a href='shangping.php?page=1'>".'|<'."</a> "; // 第一页

             for ($i=1; $i<=$total_pages; $i++) { 
             echo "<a href='shangping.php?page=".$i."'>".$i."</a> "; 
             }; 
             echo "<a href='shangping.php?page=$total_pages'>".'>|'."</a> "; // 最后一页
	 ?>
	</td>
  </tr>
</table>
</body>
</html>
