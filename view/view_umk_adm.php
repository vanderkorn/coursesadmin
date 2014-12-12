<h2>Просмотр УМК</h2>

<table width=100% cellspacing=0 cellpadding=0 bgcolor=white border=1 align=center topmargin=0 marginwidth=0>
<tr><th>Действия</th><th>Номер УМК</th><th>Название УМК</th></tr>

<?php while (($b=mysql_fetch_assoc($mas_umk))!==false){?>
<tr><td><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=removeumk&id=<?php echo $b["id"];?>"  title="Удалить"><img name="drop" src="images/drop.png" border='0'></a><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=changeumk&id=<?php echo $b["id"];?>"  title="Редактировать"><img name="drop" src="images/edit.png" border='0'></a></td><td><?php echo $b["id"]?></td><td><?php echo $b["name"]?></td></tr>
<?php }?>

</table>
  
  

