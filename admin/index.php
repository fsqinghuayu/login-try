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
	font-size:20px;
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
	<div class="as">
	<form method="post" name="form" action="adminsearch.php">搜索:<input type="text" name="textfield" />
	<select name="spec" id="spec">
	<option value="0" selected="selected">用户</option>
	<option value="1">商品</option>
	<option value="2">评论</option>
	</select>
	<input type="submit" value="search" name="submit" />
	</form></div><br/></td>
  </tr>
</table>
</body>
</html>
