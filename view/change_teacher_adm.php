<h2>Изменение преподавателя</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  name="myform" >
ФИО преподавателя: <input type="text" name="teacher" value="<?php echo $mas_teacher["name"];?>"><br>
<input type="submit" name="done" value="Изменить"><br>

<input type="reset" value="Сбросить"><br>
<input type="hidden" name="action" value="<?php echo $ACTION;?>">
<input type="hidden" name="id" value="<?php echo $id;?>"></form>