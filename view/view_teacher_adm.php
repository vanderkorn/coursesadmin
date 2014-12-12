<h2>Просмотр преподавателя</h2>

<table width=100% cellspacing=0 cellpadding=0 bgcolor=white border=1 align=center topmargin=0 marginwidth=0>
<tr><th>Действия</th><th>Номер преподавателя</th><th>ФИО преподавателя</th></tr>



<?php while (($b=mysql_fetch_assoc($mas_teacher))!==false){?>
<tr><td><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=removeteacher&id=<?php echo $b["id"];?>"  title="Удалить"><img name="drop" src="images/drop.png" border='0'></a><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=changeteacher&id=<?php echo $b["id"];?>"  title="Редактировать"><img name="drop" src="images/edit.png" border='0'></a></td><td><?php echo $b["id"]?></td><td><?php echo $b["name"]?></td></tr>
<?php }?>

</table>

