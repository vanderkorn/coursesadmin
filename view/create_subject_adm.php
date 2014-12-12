<h2>Добавление предмета</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  name="myform" >
Название предмета: <input type="text" name="subject"><br>
<input type="submit" name="done" value="Добавить"><br>
<input type="reset" value="Сбросить"><br>
<input type="hidden" name="action" value="<?php echo $ACTION;?>"></form>