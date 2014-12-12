<h2>Создание заявки</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  name="myform" >Филиал: <select name="branches" onchange="myform.submit();">
<?php while (($b=mysql_fetch_assoc($mas_branch))!==false){?>

<option  value="<?php echo $b['id'];?>" <?php if (isset($_REQUEST['branches'])){if ($_REQUEST['branches']==$b['id']){echo "selected";}}?> ><?php echo $b['title'];?></option>

<?php }?>
</select><br><input type="hidden" name="action" value="<?php echo $ACTION;?>">
</form>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  name="self" >
<input type="hidden" name="branch" value="<?php if (isset($_REQUEST['branches'])){echo $_REQUEST['branches'];}?>">
Клиент-менеджер: <select name="client">
<?php while (($b=mysql_fetch_assoc($mas_client))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['name'];?></option>
<?php }?>
</select><br>
Категория слушателей (возраст, класс): <input type="text" name="category" size="50"> <font size=2 color="#CC0000">Пример ввода: Дошкольник, 4-5 лет; Школьники, 5-7 класс; Взрослые и т.д.</font><br>
Предмет: <select name="subject">
<?php while (($b=mysql_fetch_assoc($mas_subject))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['subject'];?></option>
<?php }?>
</select><br>
Уровень: <input type="text" name="level"><br>
Расписание занятий: <input type="text" name="rasp" size="50"><font size=2 color="#CC0000">Пример ввода: ПН-СР, 16:00-16:40; ВТ-ЧТ, 18:00-19:20; СР-ПТ, 19:30-20:520 и т.д.</font><br>
Количество слушателей в группе: <input type="text" name="count"><br>
Дата открытия (группы):<input type="text" name="date_begin"  id="date_begin" ><input type="button" name="Go" id="Go" value="Календарь"  onClick="winCalendar('date_begin');"><br>
УМК в прошлом году: <select name="umk">
<option  value="-1">Не было</option>";
<?php while (($b=mysql_fetch_assoc($mas_umk))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['name'];?></option>
<?php }?>
</select> Другой УМК: <input type="text" name="aumk"><br>
Преподаватель в прошлом году: <select name="teacher">
<option  value="-1">Не было</option>";
<?php while (($b=mysql_fetch_assoc($mas_teacher))!==false){?>
<option  value="<?php echo $b['id'];?>" ><?php echo $b['name'];?></option>
<?php }?>
</select> Другой преподаватель: <input type="text" name="ateacher"><br>
Комментарии:<br><textarea rows=7 cols=75 name="comment"></textarea><br>
<input type="submit" name="done" value="Добавить"><br>
<input type="reset" value="Сбросить"><br>
<input type="hidden" name="action" value="<?php echo $ACTION;?>"></form>