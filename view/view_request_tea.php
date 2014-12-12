<font size="2"><table width="100%" cellspacing="0" cellpadding="0" bgcolor=white border="1" align="center" topmargin="0" marginwidth="0" >
<tr><th rowspan="2" width="30px">Дейстия</th><th rowspan="2"  width="30px">Номер заявки</th><th colspan="2">Заявка</th><th rowspan="2">Дата подачи заявки</th><th rowspan="2">Филиал</th><th rowspan="2">Клиент-менеджер</th><th rowspan="2">Категория слушателей (возраст, класс)</th><th rowspan="2">Предмет</th><th colspan="2">Прошлый учебный год</th><th rowspan="2">Уровень</th><th rowspan="2">Расписание (дни и время занятий)</th><th rowspan="2">Примерная дата начала занятий</th><th rowspan="2">Количество человек в группе</th></tr>
<tr><th>УМК</th><th>Преподаватель</th><th>Назначенный УМК</th><th>Назначенный  преподаватель</th></tr>
<tr><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  name="self" ><td><input type="submit" name="select" value="Выбрать"></td><td>От: <input type="text" name="num0" size="5"><br>До: <input type="text" name="num1"  size="5"><br></td><td ><select name="status_umk">
<option  value="-1"></option><option  value="1">Ожидание</option><option  value="2">Обработка</option><option  value="3">Выполнено</option></select></td><td bgcolor=""><select name="status_teacher">
<option  value="-1"></option><option  value="1">Ожидание</option><option  value="2">Обработка</option><option  value="3">Выполнено</option></select>
</td><td>От: <input type="text" name="date_create0" size="10"><br>До: <input type="text" name="date_create1"  size="10"><br></td><td><select name="branch"  style="width:100px">>
<option  value="-1"></option>";
<?php while (($b=mysql_fetch_assoc($mas_branch))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['title'];?></option>
<?php }?></select></td><td><select name="client"  style="width:100px">
<option  value="-1"></option>
<?php while (($b=mysql_fetch_assoc($mas_client))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['name'];?></option>
<?php }?>
</select><br></td><td><input type="text" name="category"  size="7"><br></td><td><select name="subject"  style="width:100px">>
<option  value="-1"></option>";
<?php while (($b=mysql_fetch_assoc($mas_subject))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['subject'];?></option>
<?php }?>
</select><br></td><td><select name="umk"   style="width:100px">
<option  value="-1"></option>";
<?php while (($b=mysql_fetch_assoc($mas_umk))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['name'];?></option>
<?php }?></select></td><td><select name="teacher" style="width:100px">
<option  value="-1"></option>";
<?php while (($b=mysql_fetch_assoc($mas_teacher))!==false){?>
<option  value="<?php echo $b['id'];?>"  ><?php echo $b['name'];?></option>
<?php }?>
</select></td><td><input type="text" name="level"  size="7"><br></td><td><input type="text" name="rasp"  size="7"><br></td><td>От: <input type="text" name="date_begin0"  size="5"><br>До: <input type="text" name="date_begin1"  size="5"><br></td><td><input type="text" name="count"  size="4"><br></td></form></tr>
<?php $i=1;?>
<?php while (($b=mysql_fetch_assoc($mas_request))!==false){?>
<tr><td><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=change&id=<?php echo $b["id"];?>"  title="Редактировать"><img name="chan" src="images/edit.png" border='0'></a>&nbsp;</td><td><?php echo $i;?>&nbsp;</td><td bgcolor="<?php echo getColorStatus($b["status_umk"]);?>"><?php echo getDescripStatus($b["status_umk"],$b["f_umk"],$b["date_change_umk"]);?><br><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=changestatusumk&type=1&id=<?php echo $b["id"];?>"  title="В ожидание"><img src="images/waiting.gif" border="0"></a><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=changestatusumk&type=2&id=<?php echo $b["id"];?>"  title="В обработку"><img src="images/processing.gif" border="0"></a>&nbsp;</td><td bgcolor="<?php echo getColorStatus($b["status_teacher"]);?>"><?php echo getDescripStatus($b["status_teacher"],$b["f_teacher"],$b["date_change_teacher"]);?><br><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=changestatusteacher&type=1&id=<?php echo $b["id"];?>"  title="В ожидание"><img src="images/waiting.gif" border="0"></a><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=changestatusteacher&type=2&id=<?php echo $b["id"];?>"  title="В обработку"><img src="images/processing.gif" border="0"></a>&nbsp;</td><td><?php echo MySQLToDate($b["date"]);?>&nbsp;</td><td><?php echo $b["title"];?>&nbsp;</td><td><?php echo $b["name"];?>&nbsp;</td><td><?php echo $b["category"];?>&nbsp;</td><td><?php echo $b["subject"]?>&nbsp;</td><td><?php echo $b["l_umk"]?>&nbsp;</td><td><?php echo $b["l_teacher"]?>&nbsp;</td><td><?php echo $b["level"]?>&nbsp;</td><td><?php echo $b["rasp"]?>&nbsp;</td><td><?php echo MySQLToDate2($b["date_begin"]);?>&nbsp;</td><td><?php echo $b["count"]?>&nbsp;</tr>
<?php $i++;?>
<?php }?>

</table></font>
<div style="margin-left: 15%;"><img src="images/waiting.gif" style="border: 0px none;" height="15"> - перевести в статус ожидание<br>
<img src="images/processing.gif" style="border: 0px none;" height="15"> - перевести в статус обработка<br>
</div>
  
  

