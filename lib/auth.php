<?php
 if (!isset($_SESSION['auth']))
 {
 		if ((!isset($_REQUEST['login']))&& (!isset ($_REQUEST['password'])))
		{
		 echo "<!DOCTYPE html PUBLIC \"-\\W3C\\DTD XHTML 1.0 Transitional\\EN\" \"http:\\www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
echo "<title>Подготовка Рассылки</title>";
echo "</head>";
echo "<body>";
		echo "<div style=\"vertical-align:middle; position:absolute; top:40%; left:50%;width:300px;height:100px;margin-top:-50px; margin-left:-150px;\"><fieldset><legend>Авторизация</legend><form action=\"". $_SERVER['PHP_SELF']."\" method=\"POST\" style=\"vertical-align:middle\"><table align=center valign=middle style=\"vertical-align:middle\"><tr><td width=40%>Ваш логин:</td><td width=60% align=left><input type=\"text\" name=\"login\"></td></tr><tr><td width=40%>Ваш пароль:</td><td width=60% align=left><input type=\"password\" name=\"password\"></td></tr><tr><td width=100% colspan=2 align=center><input type=\"submit\" value=\"Войти\">&nbsp;&nbsp;<input type=\"reset\" value=\"Сбросить\"></td></table></form></fieldset></div></body></html>";exit();
    	}
		else
		{
		 if (isset($_REQUEST['login']) && isset ($_REQUEST['password']))
	        {
	   if (isLogin($_REQUEST['login'],$_REQUEST['password']))
	   
	                {
						$_SESSION['auth']=1;	
						$id=GetBranch($_REQUEST['login'])
						$_SESSION['group']=GetGroup($id);
					//header("Location:".$_SERVER['PHP_SELF']);
					}
					else
					{
					echo "Не корректный логи и/или пароль!<a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></body></html>";exit();
					}
					}
		}
 
 }
 else
 {
	 if ((!isset($_SESSION['auth'])) || ($_SESSION['auth']!=1))
	        {
	  
					echo "bad!</body></html>";exit();
			}
 
 }
		?>