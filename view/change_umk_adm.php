<h2>Изменение УМК</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  name="myform" >
Название УМК: <input type="text" name="umk" value="<?php echo $mas_umk["name"];?>"><br>
<input type="submit" name="done" value="Изменить"><br>

<input type="reset" value="Сбросить"><br>
<input type="hidden" name="action" value="<?php echo $ACTION;?>">
<input type="hidden" name="id" value="<?php echo $id;?>"></form>