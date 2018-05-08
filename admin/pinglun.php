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
            header("Content-type:text/html;charset=utf-8");
			$num_rec_per_page=10;
            $link = mysqli_connect('localhost','web123','123','db_shop');//链接数据库
            mysqli_set_charset($link,'utf8'); //设定字符集
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
            $start_from = ($page-1) * $num_rec_per_page; 
            $sql="select * from message LIMIT $start_from, $num_rec_per_page";
            $query=mysqli_query($link, $sql);
			 echo"<table border='1' align='center'>";
			 echo"<tr><td width='30'>id</td><td width='50'>主题</td><td width='300'>内容</td><td width='50'>操作</td></tr>";
            while($row = mysqli_fetch_array($query)){
			$ids=$row['id'];
			 echo"<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row['content']."</td><td><a href='delpinglun.php?ids=$ids'>删除</a></td></tr>";
			 /*echo "标题：".$row['title']."<br/>";     //row[i]该行的第几个字段（即第几列）
             echo "内容：".$row['content']."<hr/><br/>";*/
            }

		     $sql_select="select * from message";
			 $rs_result= mysqli_query($link,$sql_select);
			 $total_records=mysqli_num_rows($rs_result);
			 $total_pages=ceil($total_records/$num_rec_per_page);
			 
			 echo "<a href='pinglun.php?page=1'>".'|<'."</a> "; // 第一页

             for ($i=1; $i<=$total_pages; $i++) { 
             echo "<a href='pinglun.php?page=".$i."'>".$i."</a> "; 
             }; 
             echo "<a href='pinglun.php?page=$total_pages'>".'>|'."</a> "; // 最后一页
		?>
	
	</td>
  </tr>
</table>
</body>
</html>
