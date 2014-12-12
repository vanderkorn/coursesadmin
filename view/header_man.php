 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Панель филиала</title>
<script language="JavaScript1.2">
var newWindow;
function winCalendar($what)//вызов окошки с календарем
{ 
var date=window.showModalDialog("calendar.htm", "","dialogHeight:250 px; dialogWidth:265 px; resizable:no; center:yes");//открытие окна
document.getElementById($what).value=date;
}; 
</script>
</head>
<body><table width="100%">
<tr>
<td width="200px">
<a href="<?php echo $_SERVER['PHP_SELF']?>"><img name='del' src='images/calc.jpg' width="150px"></a>
</td>
<td align="center" >
<h1>Панель филиала</h1>
</td></tr>
<tr><td valign="top">
<a href="<?php echo $_SERVER['PHP_SELF']?>?action=create">Создать заявку</a><br />
<a href="<?php echo $_SERVER['PHP_SELF']?>">Просмотр заявок</a><br />
<a href="<?php echo $_SERVER['PHP_SELF']?>?action=exit">Выйти</a><br />
</td>
<td>
  
  

