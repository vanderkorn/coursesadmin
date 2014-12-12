 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Панель учебной части</title>
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
<td width="130px">
<a href="<?php echo $_SERVER['PHP_SELF']?>"><img name='del' src='images/calc.jpg' width="130px"></a>
</td>
<td align="center" >
<h1>Административная панель</h1>
</td></tr>
<tr><td valign="top" colspan=2>
<a href="<?php echo $_SERVER['PHP_SELF']?>?action=create">Создать заявку</a>&nbsp; | &nbsp;<a href="<?php echo $_SERVER['PHP_SELF']?>">Просмотр заявок</a>&nbsp; | &nbsp;
<a href="<?php echo $_SERVER['PHP_SELF']?>?action=createsubj">Добавить предмет</a>&nbsp; | &nbsp;<a href="<?php echo $_SERVER['PHP_SELF']?>?action=viewsubj">Просмотр предметов</a>&nbsp; | &nbsp;<a href="<?php echo $_SERVER['PHP_SELF']?>?action=viewteacher">Просмотр преподавателей</a>&nbsp; | &nbsp;<a href="<?php echo $_SERVER['PHP_SELF']?>?action=viewumk">Просмотр УМК</a>&nbsp; | &nbsp;

<a href="<?php echo $_SERVER['PHP_SELF']?>?action=exit">Выйти</a><br />
</td></tr><tr>
<td  colspan=2>
  
  

