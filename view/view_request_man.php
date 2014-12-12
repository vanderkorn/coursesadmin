<font size="2"><table width=100% cellspacing=0 cellpadding=0 bgcolor=white border=1 align=center topmargin=0 marginwidth=0>
<tr><th rowspan="2">Номер заявки</th><th colspan="2">Заявка</th><th rowspan="2">Дата подачи заявки</th><th rowspan="2">Клиент-менеджер</th><th rowspan="2">Категория слушателей (возраст, класс)</th><th rowspan="2">Предмет</th><th colspan="2">Прошлый учебный год</th><th rowspan="2">Уровень</th><th rowspan="2">Расписание (дни и время занятий)</th><th rowspan="2">Примерная дата начала занятий</th><th rowspan="2">Количество человек в группе</th></tr>
<tr><th>УМК</th><th>Преподаватель</th><th>Назначенный УМК</th><th>Назначенный  преподаватель</th></tr>
<?php $i=1;?>
<?php while (($b=mysql_fetch_assoc($mas_request))!==false){?>
<tr><td><?php echo $i;?> &nbsp;</td><td bgcolor="<?php echo getColorStatus($b["status_umk"]);?>"><?php echo getDescripStatus($b["status_umk"],$b["f_umk"],$b["date_change_umk"]);?> &nbsp;</td><td bgcolor="<?php echo getColorStatus($b["status_teacher"]);?>"><?php echo getDescripStatus($b["status_teacher"],$b["f_teacher"],$b["date_change_teacher"]);?> &nbsp;</td><td><?php echo MySQLToDate($b["date"]);?> &nbsp;</td><td><?php echo $b["name"];?> &nbsp;</td><td><?php echo $b["category"];?> &nbsp;</td><td><?php echo $b["subject"]?> &nbsp;</td><td><?php echo $b["l_umk"]?> &nbsp;</td><td><?php echo $b["l_teacher"]?> &nbsp;</td><td><?php echo $b["level"]?> &nbsp;</td><td><?php echo $b["rasp"]?> &nbsp;</td><td><?php echo MySQLToDate2($b["date_begin"]);?> &nbsp;</td><td><?php echo $b["count"]?> &nbsp;</td></tr>
<?php $i++;?>
<?php }?>

</table></font>

  
  

