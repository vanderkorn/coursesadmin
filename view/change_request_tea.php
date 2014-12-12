<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  name="self" >


Категория слушателей (возраст, класс): <input type="text" name="category" value="<?php echo $mas_request["category"];?>" size="50"> <font size=2 color="#CC0000">Пример ввода: Дошкольник, 4-5 лет; Школьники, 5-7 класс; Взрослые и т.д.</font><br>
Уровень: <input type="text" name="level" value="<?php echo $mas_request["level"];?>"><br>
Расписание занятий: <input type="text" name="rasp" value="<?php echo $mas_request["rasp"];?>" size="50"> <font size=2 color="#CC0000">Пример ввода: ПН-СР, 16:00-16:40; ВТ-ЧТ, 18:00-19:20; СР-ПТ, 19:30-20:520 и т.д.</font><br>
Количество слушателей в группе: <input type="text" name="count"  value="<?php echo $mas_request["count"];?>"><br>
Дата открытия (группы):<input type="text" name="date_begin"  id="date_begin"   value="<?php echo MySQLToDate2($mas_request["date_begin"]);?>"><input type="button" name="Go" id="Go" value="Календарь"  onClick="winCalendar('date_begin');"><br>
УМК в прошлом году: <select name="umk">
<option  value="-1">Не было</option>";
<?php while (($b=mysql_fetch_assoc($mas_umk))!==false){?>
<option  value="<?php echo $b['id'];?>" <?php if ($mas_request["umk_last"]==$b['id']) echo "selected";?> ><?php echo $b['name'];?></option>
<?php }?>
</select> Другой УМК: <input type="text" name="aumk"><br>
Преподаватель в прошлом году: <select name="teacher">
<option  value="-1">Не было</option>";
<?php while (($b=mysql_fetch_assoc($mas_teacher))!==false){?>
<option  value="<?php echo $b['id'];?>"  <?php if ($mas_request["teacher_last"]==$b['id']) echo "selected";?> ><?php echo $b['name'];?></option>
<?php }?>
</select> Другой преподаватель: <input type="text" name="ateacher"><br>
Комментарии:<br><textarea rows=7 cols=75 name="comment"><?php echo $mas_request["comment"];?></textarea><br>
Назначенный УМК: <select name="f_umk">
<option  value="-1">Не было</option>";
<?php while (($b=mysql_fetch_assoc($mas_umk2))!==false){?>
<option  value="<?php echo $b['id'];?>"  <?php if ($mas_request["umk_future"]==$b['id']) echo "selected";?>><?php echo $b['name'];?></option>
<?php }?>
</select> Другой УМК: <input type="text" name="f_aumk"><br>
Назначенный преподаватель: <select name="f_teacher">
<option  value="-1">Не было</option>";
<?php while (($b=mysql_fetch_assoc($mas_teacher2))!==false){?>
<option  value="<?php echo $b['id'];?>" <?php if ($mas_request["teacher_future"]==$b['id']) echo "selected";?> ><?php echo $b['name'];?></option>
<?php }?>
</select> Другой преподаватель: <input type="text" name="f_ateacher"><br>
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="submit" name="done" value="Изменить"><br>
<input type="reset" value="Сбросить"><br>
<input type="hidden" name="action" value="<?php echo $ACTION;?>"></form>