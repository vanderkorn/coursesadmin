<?php

//Проверка логина и пароля
function isLogin($login,$password)
{
$login=parseit($login);
$password=parseit($password);
$a=SELECT_FROM_CENTER_2($login,$password);
if ($a==false) return false;
return true;
}
 
 
 //экранирование симолов
function parseit($that)
 {
 if (ini_get("magic_quotes_gpc"))
	{
		$that=stripslashes($that);
	}
	return $that;
 }
 function unixToMySQL($timestamp)
{
    return date('Y-m-d H:i:s', $timestamp);
}

function parsearr($that)
 {
 if (ini_get("magic_quotes_gpc"))
	{
		$that=array_map('stripslashes',$that);
	}
	return $that;
 } 
 
   //возвращение ид филиала

function GetBranch($login)
 {
$login=parseit($login);
$a=SELECT_FROM_CENTER_1($login);
if ($a==false) return false;
$id=$a['id'];
return $id;
}

function GetGroup($id)
 {
$group="";
switch ($id)
{
case 2:
$group="ADM";
break;
case 10:
$group="TEA";
break;
default:
$group="MAN";

break;
}
return $group;
}
function selectClient($branch)
 {
$branch=parseit($branch);
$a=SELECT_FROM_CLIENT($branch);
return $a;
}
function selectClient_2()
 {
$a=SELECT_FROM_CLIENT_2();
return $a;
}
function selectCenter_3()
 {
$a=SELECT_FROM_CENTER_3();
return $a;
}

function selectSubject()
 {
$a=SELECT_FROM_SUBJECT();
return $a;
}
function selectUmkId($id)
 {
$a=SELECT_FROM_UMK_ID($id);
return $a;
}
function changeUmk($REQ,$id)
 {
 $REQ=parsearr($REQ);
 $umk=-1;
if (isset($REQ["umk"])){$umk=$REQ["umk"];}
$a=UPDATE_FROM_UMK_ID($umk,$id);
return $a;
}
function selectTeacherId($id)
 {
$a=SELECT_FROM_TEACHER_ID($id);
return $a;
}
function changeTeacher($REQ,$id)
 {
 $REQ=parsearr($REQ);
 $teacher=-1;
if (isset($REQ["teacher"])){$teacher=$REQ["teacher"];}
$a=UPDATE_FROM_TEACHER_ID($teacher,$id);
return $a;
}
function selectSubjectId($id)
 {
$a=SELECT_FROM_SUBJECT_ID($id);
return $a;
}
function changeSubject($REQ,$id)
 {
 $REQ=parsearr($REQ);
 $subject=-1;
if (isset($REQ["subject"])){$subject=$REQ["subject"];}
$a=UPDATE_FROM_SUBJECT_ID($subject,$id);
return $a;
}
function selectUmk()
 {
$a=SELECT_FROM_UMK();
return $a;
}
function selectRequestMAN($id)
 {
$a=SELECT_FROM_REQUEST_MAN($id);
return $a;
}
function selectRequest($id)
 {
$a=SELECT_FROM_REQUEST($id);
return $a;
}
function selectRequestTEA()
 {
$a=SELECT_FROM_REQUEST_TEA();
return $a;
}
function selectRequestTEA_NOALL($REQ)
{
$REQ=parsearr($REQ);

$client=-1;
if (isset($REQ["client"])){$client=$REQ["client"];}
$category="";
if (isset($REQ["category"])){$category=$REQ["category"];}
$subject=-1;
if (isset($REQ["subject"])){$subject=$REQ["subject"];}
$level="";
if (isset($REQ["level"])){$level=$REQ["level"];}
$rasp="";
if (isset($REQ["rasp"])){$rasp=$REQ["rasp"];}
$count="";
if (isset($REQ["count"])){$count=$REQ["count"];}
$status_umk=-1;
if (isset($REQ["status_umk"])){$status_umk=$REQ["status_umk"];}
$status_teacher=-1;
if (isset($REQ["status_teacher"])){$status_teacher=$REQ["status_teacher"];}
$date0="";
if (isset($REQ['date_begin0'])){if ($REQ['date_begin0']!="")$date0=DateToDate($REQ['date_begin0']);}
$date1="";
if (isset($REQ['date_begin1'])){if ($REQ['date_begin1']!="")$date1=DateToDate($REQ['date_begin1']);}

$num0="";
if (isset($REQ['num0'])){$num0=$REQ['num0'];}
$num1="";
if (isset($REQ['num1'])){$num1=$REQ['num1'];}

$datecr0="";
if (isset($REQ['date_create0'])){if ($REQ['date_create0']!="")$datecr0=DateToDate($REQ['date_create0']);}
$datecr1="";
if (isset($REQ['date_create1'])){if ($REQ['date_create1']!="")$datecr1=DateToDate($REQ['date_create1']);}
$branch=-1;
if (isset($REQ["branch"])){$branch=$REQ["branch"];}

$umk=-1;
if (isset($REQ['umk'])){
$umk=$REQ['umk'];
}
$teacher=-1;
if (isset($REQ['teacher'])){
$teacher=$REQ['teacher'];}

$a=SELECT_FROM_REQUEST_TEA_NOALL($client,$category,$subject,$level,$rasp,$count,$status_umk,$status_teacher,$date0,$date1,$num0,$num1,$datecr0,$datecr1,$branch,$umk,$teacher);
return $a;
}
function selectTeacher()
 {
$a=SELECT_FROM_TEACHER();
return $a;
}
function removeRequest($id)
{
$id=parseit($id);
$a=REMOVE_REQUEST($id);
return $a;
}
function removeSubject($id)
{
$id=parseit($id);
$a=REMOVE_SUBJECT($id);
return $a;
}
function removeUmk($id)
{
$id=parseit($id);
$a=REMOVE_UMK($id);
return $a;
}
function removeTeacher($id)
{
$id=parseit($id);
$a=REMOVE_TEACHER($id);
return $a;
}

function addSubject($REQ)
{
$REQ=parsearr($REQ);
$subject=-1;
if (isset($REQ["subject"])){$subject=$REQ["subject"];}
$a=INSERT_INTO_SUBJECT($subject);
return $a;
}

function addRequestMAN($REQ,$branch)
{
$REQ=parsearr($REQ);

$client=-1;
if (isset($REQ["client"])){$client=$REQ["client"];}
$category=-1;
if (isset($REQ["category"])){$category=$REQ["category"];}
$subject=-1;
if (isset($REQ["subject"])){$subject=$REQ["subject"];}
$level="";
if (isset($REQ["level"])){$level=$REQ["level"];}
$rasp="";
if (isset($REQ["rasp"])){$rasp=$REQ["rasp"];}
$count=0;
if (isset($REQ["count"])){$count=$REQ["count"];}
$date="0000-00-00";
if (isset($REQ['date_begin'])){$date=DateToDate($REQ['date_begin']);}
$comment="0000-00-00";
if (isset($REQ['comment'])){$comment=$REQ['comment'];}
$umk=-1;
if (isset($REQ['umk'])){
$umk=$REQ['umk'];
if ($umk==-1){
$aumk="";
if (isset($REQ["aumk"])){
$aumk=trim($REQ["aumk"]);
if ($aumk!=="")
{
$umk=INSERT_INTO_UMK($aumk);
}
}
}
}

$teacher=-1;
if (isset($REQ['teacher'])){
$teacher=$REQ['teacher'];
if ($teacher==-1){
$ateacher="";
if (isset($REQ["ateacher"])){

$ateacher=trim($REQ["ateacher"]);
if ($ateacher!=="")
{
$teacher=INSERT_INTO_TEACHER($ateacher);
}
}
}
}

$a=INSERT_INTO_REQUEST_MAN($client, $category,$branch, $subject, $umk, $teacher, $level, $rasp, $date, $count, $comment);
return $a;
}
function changeRequestTEA($REQ,$id)
{
$REQ=parsearr($REQ);

$category=-1;
if (isset($REQ["category"])){$category=$REQ["category"];}

$level="";
if (isset($REQ["level"])){$level=$REQ["level"];}
$rasp="";
if (isset($REQ["rasp"])){$rasp=$REQ["rasp"];}
$count=0;
if (isset($REQ["count"])){$count=$REQ["count"];}
$date="0000-00-00";
if (isset($REQ['date_begin'])){$date=DateToDate($REQ['date_begin']);}
$comment="";
if (isset($REQ['comment'])){$comment=$REQ['comment'];}


$umk=-1;
if (isset($REQ['umk'])){
$umk=$REQ['umk'];
if ($umk==-1){
$aumk="";
if (isset($REQ["aumk"])){
$aumk=trim($REQ["aumk"]);
if ($aumk!=="")
{
$umk=INSERT_INTO_UMK($aumk);
}
}
}
}

$teacher=-1;
if (isset($REQ['teacher'])){
$teacher=$REQ['teacher'];
if ($teacher==-1){
$ateacher="";
if (isset($REQ["ateacher"])){

$ateacher=trim($REQ["ateacher"]);
if ($ateacher!=="")
{
$teacher=INSERT_INTO_TEACHER($ateacher);
}
}
}
}
$f_umk=-1;
if (isset($REQ['f_umk'])){
$f_umk=$REQ['f_umk'];
if ($f_umk==-1){
$f_aumk="";
if (isset($REQ["f_aumk"])){
$f_aumk=trim($REQ["f_aumk"]);
if ($f_aumk!=="")
{
$f_umk=INSERT_INTO_UMK($f_aumk);}

}
}
}

$f_teacher=-1;
if (isset($REQ['f_teacher'])){
$f_teacher=$REQ['f_teacher'];
if ($f_teacher==-1){
$f_ateacher="";
if (isset($REQ["f_ateacher"])){
$f_ateacher=trim($REQ["f_ateacher"]);
if ($f_ateacher!=="")
{
$f_teacher=INSERT_INTO_TEACHER($f_ateacher);
}

}
}
}
if ($f_umk!=-1){$status_umk=3;changeStatusUMK($status_umk,$id);}
if ($f_teacher!=-1){$status_teacher=3;changeStatusTEA($status_teacher,$id);}
$a=UPDATE_INTO_REQUEST_TEA($category, $umk, $teacher, $level, $rasp, $date, $count, $comment,$f_umk,$f_teacher,$id);
return $a;
}
function changeRequestADM($REQ,$id)
{
$REQ=parsearr($REQ);
$branch=-1;
if (isset($REQ["branch"])){$branch=$REQ["branch"];}
$client=-1;
if (isset($REQ["client"])){$client=$REQ["client"];}

$category=-1;
if (isset($REQ["category"])){$category=$REQ["category"];}

$level="";
if (isset($REQ["level"])){$level=$REQ["level"];}
$rasp="";
if (isset($REQ["rasp"])){$rasp=$REQ["rasp"];}
$count=0;
if (isset($REQ["count"])){$count=$REQ["count"];}
$date="0000-00-00";
if (isset($REQ['date_begin'])){$date=DateToDate($REQ['date_begin']);}
$comment="";
if (isset($REQ['comment'])){$comment=$REQ['comment'];}


$umk=-1;
if (isset($REQ['umk'])){
$umk=$REQ['umk'];
if ($umk==-1){
$aumk="";
if (isset($REQ["aumk"])){
$aumk=trim($REQ["aumk"]);
if ($aumk!=="")
{
$umk=INSERT_INTO_UMK($aumk);
}
}
}
}

$teacher=-1;
if (isset($REQ['teacher'])){
$teacher=$REQ['teacher'];
if ($teacher==-1){
$ateacher="";
if (isset($REQ["ateacher"])){

$ateacher=trim($REQ["ateacher"]);
if ($ateacher!=="")
{
$teacher=INSERT_INTO_TEACHER($ateacher);
}
}
}
}
$f_umk=-1;
if (isset($REQ['f_umk'])){
$f_umk=$REQ['f_umk'];
if ($f_umk==-1){
$f_aumk="";
if (isset($REQ["f_aumk"])){
$f_aumk=trim($REQ["f_aumk"]);
if ($f_aumk!=="")
{
echo "f_aumk=".$f_aumk.";";
$f_umk=INSERT_INTO_UMK($f_aumk);}

}
}
}


$f_teacher=-1;
if (isset($REQ['f_teacher'])){
$f_teacher=$REQ['f_teacher'];
if ($f_teacher==-1){
$f_ateacher="";
if (isset($REQ["f_ateacher"])){
$f_ateacher=trim($REQ["f_ateacher"]);
if ($f_ateacher!=="")
{echo "f_ateacher=".$f_ateacherk.";";
$f_teacher=INSERT_INTO_TEACHER($f_ateacher);
}

}
}
}
if ($f_umk!=-1){$status_umk=3;changeStatusUMK($status_umk,$id);}
if ($f_teacher!=-1){$status_teacher=3;changeStatusTEA($status_teacher,$id);}
$a=UPDATE_INTO_REQUEST_ADM($branch,$client,$category, $umk, $teacher, $level, $rasp, $date, $count, $comment,$f_umk,$f_teacher,$id);
return $a;
}
function changeStatusUMK($status,$id)
{
$date_change_umk=unixToMySQL(time());
$a=UPDATE_INTO_REQUEST_TEA_UMK($status,$date_change_umk,$id);
return $a;
}
function changeStatusTEA($status,$id)
{
$date_change=unixToMySQL(time());
$a=UPDATE_INTO_REQUEST_TEA_TEACHER($status,$date_change,$id);
return $a;
}
function getColorStatus($status)
{
$color="red";
 switch ($status)
 {
 case "1":
 $color="red";
 break;
  case "2":
  $color="yellow";
 break;
  case "3":
   $color="lime";
 break;
 }
 return $color;
}
function getDescripStatus($status,$desc,$date)
{
$text="Ожидание...";
switch ($status)
 {
 case "1":
$text="Ожидание...";
 break;
  case "2":
$text="Обработка...<br /><font size=2>Дата изменения: ".MySQLToDate($date)."</font>";
 break;
  case "3":
$text="<b>".$desc."</b> <br /><font size=2>Дата изменения: ".MySQLToDate($date)."</font>";
 break;
 }
  return $text;
}
function DateToDate($date)
{
	list($day, $month, $year) = sscanf($date, "%02d.%02d.%04d");
	$dat="$year-$month-$day"; 
	return $dat;
}

function LogOut()
{
$_SESSION=array();
//@unset($_COOKIE[session_name()]);
unset($_COOKIE[session_name()]);
session_destroy();

//header("Location:".$_SERVER['PHP_SELF']);
}
function MySQLToDate($date)
{
	$date=strtotime($date);
	$date=date("d.m.Y H:i:s",$date);
	return $date;
}
function MySQLToDate2($date)
{

//if ($date<=1)
if ($date=="0000-00-00")
{
	$date="Неизвестно";
	}else
	{$date=strtotime($date);
	$date=date("d.m.Y",$date);
	}
	return $date;
}
function copyAkcForm($id)
	{
		if (ini_get("magic_quotes_gpc"))
	{
		$id=stripslashes($id);
	}
	$q=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
	//$q=mysql_query('SELECT *  FROM '.$GLOBALS["table_Dis"].' where id='.$id.''); 
	$b=mysql_fetch_assoc($q);//выбираем запись
	
		
		
		echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" name='sel'   onsubmit=\"return checkDisAkc(document.sel);\" >";
				echo "<input type=\"hidden\" name=\"name\" value='".$b['name']."'><br>";
		echo "<input type=\"hidden\" name=\"description\" value='".$b['description']."'><br>";
		$t= "Бессрочно";
	 $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  $a0="";
	  $a1="";
	  $a2="";
	  if (($b['date_begin']=="0000-00-00")&&($b['date_end']=="0000-00-00")){
	  $t0="00.00.0000";$t1="00.00.0000";
	    $a0="checked";
	  $a1="disabled";
	  $a2="disabled";
	  }
	  else
	  {
	  $t0=date("d.m.Y",$t0);
	    $t1=date("d.m.Y",$t1);
	  }
	  echo "Бессрочно:<input type='checkbox' name='notlimit' value='1' ".$a0." onClick='javascript:modeCheck(document.sel);'><br>";
		echo "Дата начала:<input type=\"text\" name=\"date_begin\"  id=\"date_begin\"  ".$a1."  value=\"".$t0."\"><input type=\"button\" name=\"Go\" id=\"Go\" value=\"Календарь\"  ".$a1." onClick=\"winCalendar('date_begin')\"><br>";
		echo "Дата конца:<input type=\"text\" name=\"date_end\"  id=\"date_end\"  ".$a2." value=\"".$t1."\"><input type=\"button\" name=\"Go2\" id=\"Go2\" value=\"Календарь\"  ".$a2." onClick=\"winCalendar('date_end')\"><br>";
		$st1="selected";
		$st2="";
		if ($b['is_one']==1)
		{
		$st2="selected";
		$st1="";
		}
				$select=printCombo($b['branch']);
		echo "Филиал: ".$select."<br />";
		echo "Суммирующая?<select name=\"is_one\"><option  value=\"0\" ".$st1."s>Нет</option><option value=\"1\" ".$st2.">Да</option></select><br>";
		echo "Процент:<input type=\"text\" name=\"interest\"  id=\"interest\" value=\"".$b['interest']."\"><input type='radio' name='mode' value='0' checked onClick='javascript:modef(0);'><br>";
		echo "Цена:<input type=\"text\" name=\"cost\" id=\"cost\" disabled  value=\"".$b['cost']."\"><input type='radio' name='mode' value='1' onClick='javascript:modef(1);'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Скопировать\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"action\" value=\"copy\">";
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
			echo "<input type=\"hidden\" name=\"section\" value=\"akc\">";
		echo "</form>";
	}
function copyAkc()
{
if (ini_get("magic_quotes_gpc"))
			{
				$_REQUEST=array_map('stripslashes',$_REQUEST);
			}
$inter=0;
$cost=0;
if (isset($_REQUEST['interest'])){$inter=$_REQUEST['interest'];}
if (isset($_REQUEST['cost'])){$cost=$_REQUEST['cost'];}
$d1="";
$d2="";
if (isset($_REQUEST['notlimit']))
{
$d1="0000-00-00";
$d2="0000-00-00";
}
else
{
if (isset($_REQUEST['date_begin'])){$d1=DateToDate($_REQUEST['date_begin']);}
if (isset($_REQUEST['date_end'])){$d2=DateToDate($_REQUEST['date_end']);}	
}	
	$a=mysql_qw('select * from '.$GLOBALS["table_Dis"].'  where name=? and description=? and branch=?',$_REQUEST['name'],$_REQUEST['description'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
//$a=mysql_query("select * from ".$GLOBALS["table_Dis"]." where name='".$_REQUEST['name']."' and description='".$_REQUEST['description']."' and branch='".$_REQUEST['branch']."'") or die(mysql_error());
	$num=mysql_num_rows ($a);
	//mysql_query("UPDATE ".$GLOBALS["table_Traf"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', cost='".$_REQUEST['cost']."', branch='".$_REQUEST['branch']."' where id='".$_REQUEST['id']."'")or die ("Не удалось добавить запись: ".mysql_error());
	if ($num!=0)
	{
	echo "<html><body><center><h1>Акция не скопирован, такая акция уже существует.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
	}else{
		mysql_qw('INSERT INTO '.$GLOBALS["table_Dis"].'  SET   name=?, description=?, date_begin=?, date_end=?,interest=?,cost=?, is_one=?, isoption=1,branch=?',$_REQUEST['name'],$_REQUEST['description'],$d1,$d2,$inter,$cost,$_REQUEST['is_one'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
	//mysql_query("INSERT INTO ".$GLOBALS["table_Dis"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', date_begin='".$d1."', date_end='".$d2."',interest='".$inter."',cost='".$cost."', is_one='".$_REQUEST['is_one']."', isoption=1,branch='".$_REQUEST['branch']."'")or die ("Не удалось добавить запись: ".mysql_error());
	echo "<html><body><center><h1>Акция скопирована.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=akc\">Назад</a></center></body></html>";
	}
}
function copyTrafForm($id)
{
	if (ini_get("magic_quotes_gpc"))
	{
		$id=stripslashes($id);
	}
	$q=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Traf"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
	//$q=mysql_query('SELECT *  FROM '.$GLOBALS["table_Traf"].' where id='.$id.''); 
	$b=mysql_fetch_assoc($q);//выбираем запись
		echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\"  name='self' onsubmit=\"return check(document.self);\" >";
		echo "<input type=\"hidden\" name=\"name\" value='".$b['name']."'><br>";
		echo "<input type=\"hidden\" name=\"description\" value='".$b['description']."'><br>";
		$select=printCombo($b['branch']);
		echo "Филиал: ".$select."<br />";
		echo "Цена:<input type=\"text\" name=\"cost\" value='".$b['cost']."'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Копировать\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
		echo "<input type=\"hidden\" name=\"action\" value=\"copy\">";
		echo "<input type=\"hidden\" name=\"section\" value=\"traf\">";
		echo "</form>";
}
function copyTraf()
{
if (ini_get("magic_quotes_gpc"))
			{
				$_REQUEST=array_map('stripslashes',$_REQUEST);
			}
		$a=mysql_qw('select * from '.$GLOBALS["table_Traf"].'  where name=? and description=? and branch=?',$_REQUEST['name'],$_REQUEST['description'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());	
	//$a=mysql_query("select * from ".$GLOBALS["table_Traf"]." where name='".$_REQUEST['name']."' and description='".$_REQUEST['description']."' and branch='".$_REQUEST['branch']."'") or die(mysql_error());
	$num=mysql_num_rows ($a);
	if ($num!=0)
	{
		echo "<html><body><center><h1>Тариф не скопирован, такой тариф уже существует.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
	}else{
		mysql_qw('INSERT INTO '.$GLOBALS["table_Traf"].'  SET   name=?, description=?,cost=?,branch=?',$_REQUEST['name'],$_REQUEST['description'],$_REQUEST['cost'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
		//mysql_query("INSERT INTO ".$GLOBALS["table_Traf"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', cost='".$_REQUEST['cost']."',branch='".$_REQUEST['branch']."'")or die ("Не удалось добавить запись: ".mysql_error());
	echo "<html><body><center><h1>Тариф скопирован.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
	}
}
function copyDisForm($id)
	{
	
	if (ini_get("magic_quotes_gpc"))
	{
		$id=stripslashes($id);
	}
	$q=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());

	//$q=mysql_query('SELECT *  FROM '.$GLOBALS["table_Dis"].' where id='.$id.''); 
	$b=mysql_fetch_assoc($q);//выбираем запись
	
		
		
		echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" name='sel'   onsubmit=\"return checkDisAkc(document.sel);\" >";
				echo "<input type=\"hidden\" name=\"name\" value='".$b['name']."'><br>";
		echo "<input type=\"hidden\" name=\"description\" value='".$b['description']."'><br>";
		$t= "Бессрочно";
	 $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  $a0="";
	  $a1="";
	  $a2="";
	  if (($b['date_begin']=="0000-00-00")&&($b['date_end']=="0000-00-00")){
	  $t0="00.00.0000";$t1="00.00.0000";
	    $a0="checked";
	  $a1="disabled";
	  $a2="disabled";
	  }
	  else
	  {
	  $t0=date("d.m.Y",$t0);
	    $t1=date("d.m.Y",$t1);
	  }
	  	echo "Бессрочно:<input type='checkbox' name='notlimit' value='1' ".$a0." onClick='javascript:modeCheck(document.sel);'><br>";
		echo "Дата начала:<input type=\"text\" name=\"date_begin\"  id=\"date_begin\"  ".$a1."  value=\"".$t0."\"><input type=\"button\" name=\"Go\" id=\"Go\" value=\"Календарь\"  ".$a1." onClick=\"winCalendar('date_begin')\"><br>";
		echo "Дата конца:<input type=\"text\" name=\"date_end\"  id=\"date_end\"  ".$a2." value=\"".$t1."\"><input type=\"button\" name=\"Go2\" id=\"Go2\" value=\"Календарь\"  ".$a2." onClick=\"winCalendar('date_end')\"><br>";
		$st1="selected";
		$st2="";
		if ($b['is_one']==1)
		{
		$st2="selected";
		$st1="";
		}
				$select=printCombo($b['branch']);
		echo "Филиал: ".$select."<br />";
		echo "Суммирующая?<select name=\"is_one\"><option  value=\"0\" ".$st1."s>Нет</option><option value=\"1\" ".$st2.">Да</option></select><br>";
		echo "Процент:<input type=\"text\" name=\"interest\"  id=\"interest\" value=\"".$b['interest']."\"><input type='radio' name='mode' value='0' checked onClick='javascript:modef(0);'><br>";
		echo "Цена:<input type=\"text\" name=\"cost\" id=\"cost\" disabled  value=\"".$b['cost']."\"><input type='radio' name='mode' value='1' onClick='javascript:modef(1);'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Копировать\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"action\" value=\"copy\">";
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
			echo "<input type=\"hidden\" name=\"section\" value=\"dis\">";
		echo "</form>";
	}
function copyDis()
{
if (ini_get("magic_quotes_gpc"))
			{
				$_REQUEST=array_map('stripslashes',$_REQUEST);
			}

$inter=0;
$cost=0;
if (isset($_REQUEST['interest'])){$inter=$_REQUEST['interest'];}
if (isset($_REQUEST['cost'])){$cost=$_REQUEST['cost'];}
$d1="";
$d2="";
if (isset($_REQUEST['notlimit']))
{
$d1="0000-00-00";
$d2="0000-00-00";
}
else
{
if (isset($_REQUEST['date_begin'])){$d1=DateToDate($_REQUEST['date_begin']);}
if (isset($_REQUEST['date_end'])){$d2=DateToDate($_REQUEST['date_end']);}	
}	
	$a=mysql_qw('select * from '.$GLOBALS["table_Dis"].'  where name=? and description=? and branch=?',$_REQUEST['name'],$_REQUEST['description'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
//$a=mysql_query("select * from ".$GLOBALS["table_Dis"]." where name='".$_REQUEST['name']."' and description='".$_REQUEST['description']."' and branch='".$_REQUEST['branch']."'") or die(mysql_error());
	$num=mysql_num_rows ($a);

	if ($num!=0)
	{
	echo "<html><body><center><h1>Скидка не скопирован, такая скидка уже существует.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
	}else{
	
	mysql_qw('INSERT INTO '.$GLOBALS["table_Dis"].'  SET   name=?, description=?, date_begin=?, date_end=?,interest=?,cost=?, is_one=?, isoption=0,branch=?',$_REQUEST['name'],$_REQUEST['description'],$d1,$d2,$inter,$cost,$_REQUEST['is_one'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
	//mysql_query("INSERT INTO ".$GLOBALS["table_Dis"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', date_begin='".$d1."', date_end='".$d2."',interest='".$inter."',cost='".$cost."', is_one='".$_REQUEST['is_one']."', isoption=0,branch='".$_REQUEST['branch']."'")or die ("Не удалось добавить запись: ".mysql_error());
	echo "<html><body><center><h1>Скидка скопирована.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
	}
}
function changeAkcForm($id)
	{
	
		if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			$q=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
//	$q=mysql_query('SELECT *  FROM '.$GLOBALS["table_Dis"].' where id='.$id.''); 
	$b=mysql_fetch_assoc($q);//выбираем запись
	
	echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" name='sel'   onsubmit=\"return checkDisAkc(document.sel);\" >";
		echo "Название: <input type=\"text\" name=\"name\" value=\"".$b['name']."\"><br>";
		echo "Описание:<br><textarea rows=7 cols=75 name=\"description\"  value=\"".$b['description']."\">".$b['description']."</textarea><br>";
		$t= "Бессрочно";
	 $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  $a0="";
	  $a1="";
	  $a2="";
	  if (($t0==0)&&($t1==0)){
	  $t0="00.00.0000";$t1="00.00.0000";
	    $a0="checked";
	  $a1="disabled";
	  $a2="disabled";
	  }
	  else
	  {
	  $t0=date("d.m.Y",$t0);
	    $t1=date("d.m.Y",$t1);
	  }
	  	echo "Бессрочно:<input type='checkbox' name='notlimit' value='1' ".$a0." onClick='javascript:modeCheck(document.sel);'><br>";
		echo "Дата начала:<input type=\"text\" name=\"date_begin\"  id=\"date_begin\"  ".$a1."  value=\"".$t0."\"><input type=\"button\" name=\"Go\" id=\"Go\" value=\"Календарь\"  ".$a1." onClick=\"winCalendar('date_begin')\"><br>";
		echo "Дата конца:<input type=\"text\" name=\"date_end\"  id=\"date_end\"  ".$a2." value=\"".$t1."\"><input type=\"button\" name=\"Go2\" id=\"Go2\" value=\"Календарь\"  ".$a2." onClick=\"winCalendar('date_end')\"><br>";
		$st1="selected";
		$st2="";
		if ($b['is_one']==1)
		{
		$st2="selected";
		$st1="";
		}
				$select=printCombo($b['branch']);
		echo "Филиал: ".$select."<br />";
		echo "Суммирующая?<select name=\"is_one\"><option  value=\"0\" ".$st1."s>Нет</option><option value=\"1\" ".$st2.">Да</option></select><br>";
		echo "Процент:<input type=\"text\" name=\"interest\"  id=\"interest\" value=\"".$b['interest']."\"><input type='radio' name='mode' value='0' checked onClick='javascript:modef(0);'><br>";
		echo "Цена:<input type=\"text\" name=\"cost\" id=\"cost\" disabled  value=\"".$b['cost']."\"><input type='radio' name='mode' value='1' onClick='javascript:modef(1);'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Изменить\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"action\" value=\"change\">";
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
			echo "<input type=\"hidden\" name=\"section\" value=\"akc\">";
		echo "</form>";
	}
function changeDisForm($id)
	{
	
	if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			$q=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
	//$q=mysql_query('SELECT *  FROM '.$GLOBALS["table_Dis"].' where id='.$id.''); 
	
	
	$b=mysql_fetch_assoc($q);//выбираем запись
	
		
		
		echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" name='sel'   onsubmit=\"return checkDisAkc(document.sel);\" >";
		echo "Название: <input type=\"text\" name=\"name\" value=\"".$b['name']."\"><br>";
		echo "Описание:<br><textarea rows=7 cols=75 name=\"description\"  value=\"".$b['description']."\">".$b['description']."</textarea><br>";
		$t= "Бессрочно";
	 $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  $a0="";
	  $a1="";
	  $a2="";
	  if (($t0==0)&&($t1==0)){
	  $t0="00.00.0000";$t1="00.00.0000";
	    $a0="checked";
	  $a1="disabled";
	  $a2="disabled";
	  }
	  else
	  {
	  $t0=date("d.m.Y",$t0);
	    $t1=date("d.m.Y",$t1);
	  }
	  	echo "Бессрочно:<input type='checkbox' name='notlimit' value='1' ".$a0." onClick='javascript:modeCheck(document.sel);'><br>";
		echo "Дата начала:<input type=\"text\" name=\"date_begin\"  id=\"date_begin\"  ".$a1."  value=\"".$t0."\"><input type=\"button\" name=\"Go\" id=\"Go\" value=\"Календарь\"  ".$a1." onClick=\"winCalendar('date_begin')\"><br>";
		echo "Дата конца:<input type=\"text\" name=\"date_end\"  id=\"date_end\"  ".$a2." value=\"".$t1."\"><input type=\"button\" name=\"Go2\" id=\"Go2\" value=\"Календарь\"  ".$a2." onClick=\"winCalendar('date_end')\"><br>";
		$st1="selected";
		$st2="";
		if ($b['is_one']==1)
		{
		$st2="selected";
		$st1="";
		}
				$select=printCombo($b['branch']);
		echo "Филиал: ".$select."<br />";
		echo "Суммирующая?<select name=\"is_one\"><option  value=\"0\" ".$st1."s>Нет</option><option value=\"1\" ".$st2.">Да</option></select><br>";
		echo "Процент:<input type=\"text\" name=\"interest\"  id=\"interest\" value=\"".$b['interest']."\"><input type='radio' name='mode' value='0' checked onClick='javascript:modef(0);'><br>";
		echo "Цена:<input type=\"text\" name=\"cost\" id=\"cost\" disabled  value=\"".$b['cost']."\"><input type='radio' name='mode' value='1' onClick='javascript:modef(1);'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Изменить\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"action\" value=\"change\">";
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
			echo "<input type=\"hidden\" name=\"section\" value=\"dis\">";
		echo "</form>";
	}
function changeDis()
{

	if (ini_get("magic_quotes_gpc"))
			{
					$_REQUEST=array_map('stripslashes',$_REQUEST);
			}
$inter=0;
$cost=0;
if (isset($_REQUEST['interest'])){$inter=$_REQUEST['interest'];}
if (isset($_REQUEST['cost'])){$cost=$_REQUEST['cost'];}
$d1="";
$d2="";
if (isset($_REQUEST['notlimit']))
{
$d1="0000-00-00";
$d2="0000-00-00";
}
else
{
if (isset($_REQUEST['date_begin'])){$d1=DateToDate($_REQUEST['date_begin']);}
if (isset($_REQUEST['date_end'])){$d2=DateToDate($_REQUEST['date_end']);}	
}	
mysql_qw('UPDATE '.$GLOBALS["table_Dis"].'  SET   name=?, description=?, date_begin=?, date_end=?,interest=?,cost=?, is_one=?, isoption=0,branch=? where id=?',$_REQUEST['name'],$_REQUEST['description'],$d1,$d2,$inter,$cost,$_REQUEST['is_one'],$_REQUEST['branch'],$_REQUEST['id'])or die ("Не удалось добавить запись: ".mysql_error());
/*if (!get_magic_quotes_gpc())
   {
   $_REQUEST['name']=mysql_escape_string($_REQUEST['name']);
   $_REQUEST['description']=mysql_escape_string($_REQUEST['description']);
   }
   
	mysql_query("UPDATE ".$GLOBALS["table_Dis"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', date_begin='".$d1."', date_end='".$d2."',interest='".$inter."',cost='".$cost."', is_one='".$_REQUEST['is_one']."', branch='".$_REQUEST['branch']."' where id='".$_REQUEST['id']."'")or die ("Не удалось добавить запись: ".mysql_error());*/
	echo "<html><body><center><h1>Скидка изменена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
}
function changeAkc()
{

	if (ini_get("magic_quotes_gpc"))
			{
					$_REQUEST=array_map('stripslashes',$_REQUEST);
			}
$inter=0;
$cost=0;
if (isset($_REQUEST['interest'])){$inter=$_REQUEST['interest'];}
if (isset($_REQUEST['cost'])){$cost=$_REQUEST['cost'];}		
$d1="";
$d2="";
if (isset($_REQUEST['notlimit']))
{
$d1="0000-00-00";
$d2="0000-00-00";
}
else
{
if (isset($_REQUEST['date_begin'])){$d1=DateToDate($_REQUEST['date_begin']);}
if (isset($_REQUEST['date_end'])){$d2=DateToDate($_REQUEST['date_end']);}	
}	
mysql_qw('UPDATE '.$GLOBALS["table_Dis"].'  SET   name=?, description=?, date_begin=?, date_end=?,interest=?,cost=?, is_one=?, isoption=1,branch=? where id=?',$_REQUEST['name'],$_REQUEST['description'],$d1,$d2,$inter,$cost,$_REQUEST['is_one'],$_REQUEST['branch'],$_REQUEST['id'])or die ("Не удалось добавить запись: ".mysql_error());

/*if (!get_magic_quotes_gpc())
   {
   $_REQUEST['name']=mysql_escape_string($_REQUEST['name']);
   $_REQUEST['description']=mysql_escape_string($_REQUEST['description']);
   }
	mysql_query("UPDATE ".$GLOBALS["table_Dis"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', date_begin='".$d1."', date_end='".$d2."',interest='".$inter."',cost='".$cost."', is_one='".$_REQUEST['is_one']."', branch='".$_REQUEST['branch']."' where id='".$_REQUEST['id']."'")or die ("Не удалось добавить запись: ".mysql_error());*/
	echo "<html><body><center><h1>Акция изменена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=akc\">Назад</a></center></body></html>";
}
function changeTrafForm($id)
{

if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			$q=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Traf"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
	//$q=mysql_query('SELECT *  FROM '.$GLOBALS["table_Traf"].' where id='.$id.''); 
	$b=mysql_fetch_assoc($q);//выбираем запись
		echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\"  name='self' onsubmit=\"return check(document.self);\" >";
		echo "Название: <input type=\"text\" name=\"name\" value='".$b['name']."'><br>";
		echo "Описание:<br><textarea rows=7 cols=75 name=\"description\" value='".$b['description']."'>".$b['description']."</textarea><br>";
		$select=printCombo($b['branch']);
		echo "Филиал: ".$select."<br />";
		echo "Цена:<input type=\"text\" name=\"cost\" value='".$b['cost']."'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Изменить\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
		echo "<input type=\"hidden\" name=\"action\" value=\"change\">";
		echo "<input type=\"hidden\" name=\"section\" value=\"traf\">";
		echo "</form>";
}
function changeTraf()
{

	if (ini_get("magic_quotes_gpc"))
	{
	$_REQUEST=array_map('stripslashes',$_REQUEST);
	}
	mysql_qw('UPDATE '.$GLOBALS["table_Traf"].'  SET   name=?, description=?, cost=?, branch=?  where id=?',$_REQUEST['name'],$_REQUEST['description'],$_REQUEST['cost'],$_REQUEST['branch'],$_REQUEST['id'])or die ("Не удалось добавить запись: ".mysql_error());
	
/*if (!get_magic_quotes_gpc())
   {
   $_REQUEST['name']=mysql_escape_string($_REQUEST['name']);
   $_REQUEST['description']=mysql_escape_string($_REQUEST['description']);
   }
	mysql_query("UPDATE ".$GLOBALS["table_Traf"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', cost='".$_REQUEST['cost']."', branch='".$_REQUEST['branch']."' where id='".$_REQUEST['id']."'")or die ("Не удалось добавить запись: ".mysql_error());*/
	echo "<html><body><center><h1>Тариф изменен.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
}
function selectDisc()
{ 
		if (ini_get("magic_quotes_gpc"))
			{
					$_REQUEST=array_map('stripslashes',$_REQUEST);
			}
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by name";
if (isset($_REQUEST['col'])&&isset($_REQUEST['sort']))
{
$col=$_REQUEST['col'];
$sort=$_REQUEST['sort'];
switch ($col)
{
case "name" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by name ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "description" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by description ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "cost" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by cost ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "interest" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by interest ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "is_one" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by is_one ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "date_begin" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by date_begin ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "date_end" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=0 order by date_end ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "branch" :
$ends="left join ".$GLOBALS["table_Center"]." on ".$GLOBALS["table_Center"].".id=".$GLOBALS["table_Dis"].".branch  where ".$GLOBALS["table_Dis"].".isoption=0 order by ".$GLOBALS["table_Center"].".title ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
}

}
$ao=mysql_qw('SELECT * FROM '.$GLOBALS["table_Dis"].' where '.$GLOBALS["table_Dis"].'.isoption=0')or die ("Не удалось добавить запись: ".mysql_error());
//$ao=mysql_query('SELECT * FROM '.$GLOBALS["table_Dis"]." where ".$GLOBALS["table_Dis"].".isoption=0"); //выбираем все поля из таблицы отсортированные по полю id
	$x=mysql_num_rows($ao);//количество строчек результата запроса
	$gran=20;
	if ($x>$gran)   //если количество строчек больше 10 то выполняется оператор
	{
	echo "<font size=\"-1\">Cтраница: ";
	for ($i=0; $i<$x/$gran; $i++)  //разбиение записей по страницам и создание ссылок на страницы
	 {
	$j=$i+1;
	echo "[";
	if (!isset($_REQUEST['p']) || $_REQUEST['p']<>$j)//если ссылки страниц не активированны или страница не равна активной то создаем на нее  ссылку
	{
	$rf=strpos($_SERVER['QUERY_STRING'],"&p=");
	if ($rf!==false)
	{
	$rf2=strpos($_SERVER['QUERY_STRING'],"&",$rf+1);
	if ($rf2!==false){$len=$rf2-$rf+1;$_SERVER['QUERY_STRING']=substr_replace($_SERVER['QUERY_STRING'],"&p=$j",$rf,$len);}
	else
	{$_SERVER['QUERY_STRING']=substr_replace($_SERVER['QUERY_STRING'],"&p=$j",$rf);}
	}
	else
	{
	$_SERVER['QUERY_STRING'].="&p=$j";
	}
	echo "<a href=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'].">";
	}
	echo $j;
	if (!isset($_REQUEST['p']) || $_REQUEST['p']<>$j)//если ссылки страниц не активированны или страница не равна активной то создаем на нее  ссылку
	{
	echo "</a>";
	}
	echo "] ";
	}
	}
	echo "<br><br></font>";
	if (isset($_REQUEST['p'])) //если активирована ссылки страницы
	{
	$xx=($_REQUEST['p']-1)*$gran;
	}
	else {
	$xx=0;
	}
$a=mysql_qw('select '.$GLOBALS["table_Dis"].'.name, '.$GLOBALS["table_Dis"].'.description, '.$GLOBALS["table_Dis"].".cost,".$GLOBALS["table_Dis"].'.interest, '.$GLOBALS["table_Dis"].'.is_one,'.$GLOBALS["table_Dis"].'.date_begin,'.$GLOBALS["table_Dis"].'.date_end,'.$GLOBALS["table_Dis"].'.branch, '.$GLOBALS["table_Dis"].'.id as ids from '.$GLOBALS["table_Dis"].' '.$ends.' limit ?, ?',$xx,$gran)or die ("Не удалось добавить запись: ".mysql_error());

//$a=mysql_query("select ".$GLOBALS["table_Dis"].".name, ".$GLOBALS["table_Dis"].".description, ".$GLOBALS["table_Dis"].".cost,".$GLOBALS["table_Dis"].".interest, ".$GLOBALS["table_Dis"].".is_one,".$GLOBALS["table_Dis"].".date_begin,".$GLOBALS["table_Dis"].".date_end,".$GLOBALS["table_Dis"].".branch, ".$GLOBALS["table_Dis"].".id as ids from ".$GLOBALS["table_Dis"]." ".$ends." limit ".$xx.", ".$gran) or die(mysql_error());

//$a=mysql_query("select * from ".$GLOBALS["table_Dis"]." where isoption=0 ".$ends) or die(mysql_error());
$str="";
$str.="<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\"  name=\"self\">";
$str.="<input type=\"hidden\" name=\"action\" value=\"delid\">";
$str.="<input type=\"hidden\" name=\"section\" value=\"dis\">";
$str.="<center><table width=100% cellspacing=0 cellpadding=0   border=1 align=center topmargin=0 marginwidth=0>";
$str.="<tr bgcolor='#66FFFF'><td><b>Название скидки <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=name&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=name&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></td><td><b>Описание скидки <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=description&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=description&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Дата начала <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=date_begin&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=date_begin&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Дата конца <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=date_end&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=date_end&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Филиал <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=branch&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=branch&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Процент <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=interest&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=interest&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Стоимость <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=cost&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=cost&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Суммирующая? <br /><a href='".$_SERVER['PHP_SELF']."?section=dis&col=is_one&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=dis&col=is_one&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Действия</b></td></tr>";
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)   //выбор строчек по очередно из массива
	 {
	 $t= "Бессрочно";
	 $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  if (($b['date_begin']=="0000-00-00")&&($b['date_end']=="0000-00-00")){$t0=$t;$t1=$t;}
	  else
	  {
	  $t0=date("d.m.Y",$t0);
	    $t1=date("d.m.Y",$t1);
	  }
	  $sum= "Да";
	  if ($b['is_one']==0){$sum= "Нет";}
	 $str.="<tr><td>".$b['name']."</td><td>".$b['description']."</td><td>".$t0."</td><td>".$t1."</td><td>".whatCombo($b['branch'])."</td><td>".$b['interest']."</td><td>".$b['cost']."</td><td>".$sum."</td><td><a href=".$_SERVER['PHP_SELF']."?section=dis&action=copy&id=".$b['ids']." title='Копировать'><img name='copy' src='images/copy.png' border='0'></a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=dis&action=change&id=".$b['ids']."  title='Редактировать'><img name='del' src='images/edit.png' border='0'></a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=dis&action=del&id=".$b['ids']."  title='Удалить'><img name='del' src='images/drop.png' border='0'></a>&nbsp; <input type='checkbox' name='itemsID[]' value=".$b['ids']."></td></tr>";
	 }
$str.="</table></center><br /><a href=".$_SERVER['PHP_SELF']."?section=dis&action=add>Добавить</a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=dis&action=delall>Удалить все</a>";
$str.="<div align='right'><input type=\"submit\" name=\"done\" value=\"Удалить отмеченные\"><input type=\"reset\" value=\"Сбросить\"><br></div></form>";
return $str;
}
function selectAkc()
{ 
		if (ini_get("magic_quotes_gpc"))
			{
					$_REQUEST=array_map('stripslashes',$_REQUEST);
			}


$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by name";
if (isset($_REQUEST['col'])&&isset($_REQUEST['sort']))
{
$col=$_REQUEST['col'];
$sort=$_REQUEST['sort'];
switch ($col)
{
case "name" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by name ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "description" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by description ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "cost" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by cost ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "interest" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by interest ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "is_one" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by is_one ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "date_begin" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by date_begin ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "date_end" :
$ends=" where ".$GLOBALS["table_Dis"].".isoption=1 order by date_end ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "branch" :
$ends="left join ".$GLOBALS["table_Center"]." on ".$GLOBALS["table_Center"].".id=".$GLOBALS["table_Dis"].".branch  where ".$GLOBALS["table_Dis"].".isoption=1 order by ".$GLOBALS["table_Center"].".title ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
}

}

$ao=mysql_qw('SELECT * FROM '.$GLOBALS["table_Dis"].' where '.$GLOBALS["table_Dis"].'.isoption=1')or die ("Не удалось добавить запись: ".mysql_error());
	//$ao=mysql_query('SELECT * FROM '.$GLOBALS["table_Dis"]." where ".$GLOBALS["table_Dis"].".isoption=1"); //выбираем все поля из таблицы отсортированные по полю id
	$x=mysql_num_rows($ao);//количество строчек результата запроса
$gran=20;
	if ($x>$gran)   //если количество строчек больше 10 то выполняется оператор
	{
	echo "<font size=\"-1\">Cтраница: ";
	for ($i=0; $i<$x/$gran; $i++)  //разбиение записей по страницам и создание ссылок на страницы
	 {
	$j=$i+1;
	echo "[";
	if (!isset($_REQUEST['p']) || $_REQUEST['p']<>$j)//если ссылки страниц не активированны или страница не равна активной то создаем на нее  ссылку
	{
	$rf=strpos($_SERVER['QUERY_STRING'],"&p=");
	if ($rf!==false)
	{
	$rf2=strpos($_SERVER['QUERY_STRING'],"&",$rf+1);
	if ($rf2!==false){$len=$rf2-$rf+1;$_SERVER['QUERY_STRING']=substr_replace($_SERVER['QUERY_STRING'],"&p=$j",$rf,$len);}
	else
	{$_SERVER['QUERY_STRING']=substr_replace($_SERVER['QUERY_STRING'],"&p=$j",$rf);}
	}
	else
	{
	$_SERVER['QUERY_STRING'].="&p=$j";
	}
	echo "<a href=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'].">";
	}
	
	echo $j;
	if (!isset($_REQUEST['p']) || $_REQUEST['p']<>$j)//если ссылки страниц не активированны или страница не равна активной то создаем на нее  ссылку
	{
	echo "</a>";
	}
	echo "] ";
	}
	}
	echo "<br><br></font>";
	if (isset($_REQUEST['p'])) //если активирована ссылки страницы
	{
	$xx=($_REQUEST['p']-1)*$gran;
	}
	else {
	$xx=0;
	}

$a=mysql_qw('select '.$GLOBALS["table_Dis"].'.name, '.$GLOBALS["table_Dis"].'.description, '.$GLOBALS["table_Dis"].".cost,".$GLOBALS["table_Dis"].'.interest, '.$GLOBALS["table_Dis"].'.is_one,'.$GLOBALS["table_Dis"].'.date_begin,'.$GLOBALS["table_Dis"].'.date_end,'.$GLOBALS["table_Dis"].'.branch, '.$GLOBALS["table_Dis"].'.id as ids from '.$GLOBALS["table_Dis"].' '.$ends.' limit ?, ?',$xx,$gran)or die ("Не удалось добавить запись: ".mysql_error());

//$a=mysql_query("select ".$GLOBALS["table_Dis"].".name, ".$GLOBALS["table_Dis"].".description, ".$GLOBALS["table_Dis"].".cost,".$GLOBALS["table_Dis"].".interest, ".$GLOBALS["table_Dis"].".is_one,".$GLOBALS["table_Dis"].".date_begin,".$GLOBALS["table_Dis"].".date_end,".$GLOBALS["table_Dis"].".branch, ".$GLOBALS["table_Dis"].".id as ids from ".$GLOBALS["table_Dis"]." ".$ends." limit ".$xx.", ".$gran) or die(mysql_error());

//$a=mysql_query("select * from ".$GLOBALS["table_Dis"]." where isoption=1  order by name") or die(mysql_error());
$str="";
$str.="<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\"  name=\"self\">";
$str.="<input type=\"hidden\" name=\"action\" value=\"delid\">";
$str.="<input type=\"hidden\" name=\"section\" value=\"akc\">";
$str.="<center><table width=100% cellspacing=0 cellpadding=0   border=1 align=center topmargin=0 marginwidth=0>";
$str.="<tr bgcolor='#66FFFF'><td><b>Название скидки <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=name&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=name&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></td><td><b>Описание скидки <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=description&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=description&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Дата начала <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=date_begin&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=date_begin&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Дата конца <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=date_end&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=date_end&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Филиал <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=branch&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=branch&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Процент <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=interest&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=interest&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Стоимость <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=cost&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=cost&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Суммирующая? <br /><a href='".$_SERVER['PHP_SELF']."?section=akc&col=is_one&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=akc&col=is_one&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></b></td><td><b>Действия</b></td></tr>";
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)   //выбор строчек по очередно из массива
	 {
	 $t= "Бессрочно";
	 $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  if (($b['date_begin']=="0000-00-00")&&($b['date_end']=="0000-00-00")){$t0=$t;$t1=$t;}
	  else
	  {
	    $t0=date("d.m.Y",$t0);
	    $t1=date("d.m.Y",$t1);
	  }
	  $sum= "Да";
	  if ($b['is_one']==0){$sum= "Нет";}
	 $str.="<tr><td>".$b['name']."</td><td>".$b['description']."</td><td>".$t0."</td><td>".$t1."</td><td>".whatCombo($b['branch'])."</td><td>".$b['interest']."</td><td>".$b['cost']."</td><td>".$sum."</td><td><a href=".$_SERVER['PHP_SELF']."?section=akc&action=copy&id=".$b['ids']." title='Копировать'><img name='copy' src='images/copy.png' border='0'></a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=akc&action=change&id=".$b['ids']."  title='Редактировать'><img name='del' src='images/edit.png' border='0'></a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=akc&action=del&id=".$b['ids']."  title='Удалить'><img name='del' src='images/drop.png' border='0'></a>&nbsp; <input type='checkbox' name='itemsID[]' value=".$b['ids']."></td></tr>";
	 }
$str.="</table></center><br /><a href=".$_SERVER['PHP_SELF']."?section=akc&action=add>Добавить</a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=akc&action=delall>Удалить все</a>";
$str.="<div align='right'><input type=\"submit\" name=\"done\" value=\"Удалить отмеченные\"><input type=\"reset\" value=\"Сбросить\"><br></div></form>";
return $str;
}
function delAkc($id)
{ 
if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			mysql_qw('delete from '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
//mysql_query("delete from ".$GLOBALS["table_Dis"]."  where id='".$id."'")or die(mysql_error());
	echo "<html><body><center><h1>Акция удалена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=akc\">Назад</a></center></body></html>";
	}
function delDis($id)
{ 
if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			mysql_qw('delete from '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
//mysql_query("delete from ".$GLOBALS["table_Dis"]."  where id='".$id."'")or die(mysql_error());
	echo "<html><body><center><h1>Скидка удалена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
	}
	function addDisForm()
	{
		echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" name='sel'   onsubmit=\"return checkDisAkc(document.sel);\">";
		echo "Название: <input type=\"text\" name=\"name\" value=\"\"><br>";
		echo "Описание:<br><textarea rows=7 cols=75 name=\"description\"></textarea><br>";
		echo "Бессрочно:<input type='checkbox' name='notlimit' value='1' onClick='javascript:modeCheck(document.sel);'><br>";
		echo "Дата начала:<input type=\"text\" name=\"date_begin\" id=\"date_begin\" value=\"00.00.0000\"><input type=\"button\" name=\"Go\" id=\"Go\" value=\"Календарь\" onClick=\"winCalendar('date_begin')\"><br>";
		echo "Дата конца:<input type=\"text\" name=\"date_end\" id=\"date_end\" value=\"00.00.0000\"><input type=\"button\" name=\"Go2\" id=\"Go2\" value=\"Календарь\" onClick=\"winCalendar('date_end')\"><br>";
		$select=printCombo(0);
		echo "Филиал: ".$select."<br />";
		echo "Суммирующая?<select name=\"is_one\"><option  value=\"1\" selected>Нет</option><option value=\"0\">Да</option></select><br>";
		echo "Процент:<input type=\"text\" name=\"interest\"  id=\"interest\" value=\"0\"><input type='radio' name='mode' value='0' checked onClick='javascript:modef(0);'><br>";
		echo "Цена:<input type=\"text\" name=\"cost\" id=\"cost\" disabled  value=\"0\"><input type='radio' name='mode' value='1' onClick='javascript:modef(1);'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Добавить\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"action\" value=\"add\">";
			echo "<input type=\"hidden\" name=\"section\" value=\"dis\">";
		echo "</form>";
	}
		function addAkcForm()
	{
				echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" name='sel'   onsubmit=\"return checkDisAkc(document.sel);\">";
		echo "Название: <input type=\"text\" name=\"name\" ><br>";
		echo "Описание:<br><textarea rows=7 cols=75 name=\"description\"></textarea><br>";
		echo "Бессрочно:<input type='checkbox' name='notlimit' value='1' onClick='javascript:modeCheck(document.sel);'><br>";
		echo "Дата начала:<input type=\"text\" name=\"date_begin\" id=\"date_begin\" value=\"00.00.0000\"><input type=\"button\" name=\"Go\" id=\"Go\" value=\"Календарь\" onClick=\"winCalendar('date_begin')\"><br>";
		echo "Дата конца:<input type=\"text\" name=\"date_end\" id=\"date_end\" value=\"00.00.0000\"><input type=\"button\" name=\"Go2\" id=\"Go2\" value=\"Календарь\" onClick=\"winCalendar('date_end')\"><br>";
		$select=printCombo(0);
		echo "Филиал: ".$select."<br />";
		echo "Суммирующая?<select name=\"is_one\"><option  value=\"1\" selected>Нет</option><option value=\"0\">Да</option></select><br>";
		echo "Процент:<input type=\"text\" name=\"interest\"  id=\"interest\" value=\"0\"><input type='radio' name='mode' value='0' checked onClick='javascript:modef(0);'><br>";
		echo "Цена:<input type=\"text\" name=\"cost\" id=\"cost\" disabled  value=\"0\"><input type='radio' name='mode' value='1' onClick='javascript:modef(1);'><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Добавить\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"action\" value=\"add\">";
			echo "<input type=\"hidden\" name=\"section\" value=\"akc\">";
		echo "</form>";
	}
function addDis()
{
if (ini_get("magic_quotes_gpc"))
			{
				$_REQUEST=array_map('stripslashes',$_REQUEST);
			}
$inter=0;
$cost=0;
if (isset($_REQUEST['interest'])){$inter=$_REQUEST['interest'];}
if (isset($_REQUEST['cost'])){$cost=$_REQUEST['cost'];}	

$d1="";
$d2="";
if (isset($_REQUEST['notlimit']))
{
$d1="0000-00-00";
$d2="0000-00-00";
}
else
{
if (isset($_REQUEST['date_begin'])){$d1=DateToDate($_REQUEST['date_begin']);}
if (isset($_REQUEST['date_end'])){$d2=DateToDate($_REQUEST['date_end']);}	
}
if (isset($_REQUEST['cost'])){$cost=$_REQUEST['cost'];}	


mysql_qw('INSERT INTO '.$GLOBALS["table_Dis"].'  SET   name=?, description=?, date_begin=?, date_end=?,interest=?,cost=?, is_one=?, isoption=0,branch=?',$_REQUEST['name'],$_REQUEST['description'],$d1,$d2,$inter,$cost,$_REQUEST['is_one'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
/*if (!get_magic_quotes_gpc())
   {
   $_REQUEST['name']=mysql_escape_string($_REQUEST['name']);
   $_REQUEST['description']=mysql_escape_string($_REQUEST['description']);
   }
	mysql_query("INSERT INTO ".$GLOBALS["table_Dis"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', date_begin='".$d1."', date_end='".$d2."',interest='".$inter."',cost='".$cost."', is_one='".$_REQUEST['is_one']."', isoption=0,branch='".$_REQUEST['branch']."'")or die ("Не удалось добавить запись: ".mysql_error());*/
	echo "<html><body><center><h1>Скидка добавлена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
}
function addAkc()
{
if (ini_get("magic_quotes_gpc"))
			{
				$_REQUEST=array_map('stripslashes',$_REQUEST);
			}
			
$inter=0;
$cost=0;
if (isset($_REQUEST['interest'])){$inter=$_REQUEST['interest'];}
if (isset($_REQUEST['cost'])){$cost=$_REQUEST['cost'];}	
$d1="";
$d2="";
if (isset($_REQUEST['notlimit']))
{
$d1="0000-00-00";
$d2="0000-00-00";
}
else
{
if (isset($_REQUEST['date_begin'])){$d1=DateToDate($_REQUEST['date_begin']);}
if (isset($_REQUEST['date_end'])){$d2=DateToDate($_REQUEST['date_end']);}	
}

mysql_qw('INSERT INTO '.$GLOBALS["table_Dis"].'  SET   name=?, description=?, date_begin=?, date_end=?,interest=?,cost=?, is_one=?, isoption=1,branch=?',$_REQUEST['name'],$_REQUEST['description'],$d1,$d2,$inter,$cost,$_REQUEST['is_one'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
			
/*if (!get_magic_quotes_gpc())
   {
   $_REQUEST['name']=mysql_escape_string($_REQUEST['name']);
   $_REQUEST['description']=mysql_escape_string($_REQUEST['description']);
   }
	mysql_query("INSERT INTO ".$GLOBALS["table_Dis"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', date_begin='".$d1."', date_end='".$d2."',interest='".$inter."',cost='".$cost."', is_one='".$_REQUEST['is_one']."', isoption=1,branch='".$_REQUEST['branch']."'")or die ("Не удалось добавить запись: ".mysql_error());*/
	echo "<html><body><center><h1>Акция добавлена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=akc\">Назад</a></center></body></html>";
}
function selectTraf()
{ 

			if (ini_get("magic_quotes_gpc"))
			{
					$_REQUEST=array_map('stripslashes',$_REQUEST);
			}

$ends="order by name";
if (isset($_REQUEST['col'])&&isset($_REQUEST['sort']))
{
$col=$_REQUEST['col'];
$sort=$_REQUEST['sort'];
switch ($col)
{
case "name" :
$ends="order by name ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "description" :
$ends="order by description ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "cost" :
$ends="order by cost ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
case "branch" :
$ends="left join ".$GLOBALS["table_Center"]." on ".$GLOBALS["table_Center"].".id=".$GLOBALS["table_Traf"].".branch order by ".$GLOBALS["table_Center"].".title ";
if ($sort=="down"){$ends.="desc";}
if ($sort=="up"){$ends.="asc";}
break;
}

}
	$ao=mysql_query('SELECT * FROM '.$GLOBALS["table_Traf"]); //выбираем все поля из таблицы отсортированные по полю id
	$x=mysql_num_rows($ao);//количество строчек результата запроса
	$gran=20;
	if ($x>$gran)   //если количество строчек больше 10 то выполняется оператор
	{
	echo "<font size=\"-1\">Cтраница: ";
	for ($i=0; $i<$x/$gran; $i++)  //разбиение записей по страницам и создание ссылок на страницы
	 {
	$j=$i+1;
	echo "[";
	if (!isset($_REQUEST['p']) || $_REQUEST['p']<>$j)//если ссылки страниц не активированны или страница не равна активной то создаем на нее  ссылку
	{
	$rf=strpos($_SERVER['QUERY_STRING'],"&p=");
	if ($rf!==false)
	{
	$rf2=strpos($_SERVER['QUERY_STRING'],"&",$rf+1);
	if ($rf2!==false){$len=$rf2-$rf+1;$_SERVER['QUERY_STRING']=substr_replace($_SERVER['QUERY_STRING'],"&p=$j",$rf,$len);}
	else
	{$_SERVER['QUERY_STRING']=substr_replace($_SERVER['QUERY_STRING'],"&p=$j",$rf);}
	}
	else
	{
	$_SERVER['QUERY_STRING'].="&p=$j";
	}
	echo "<a href=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'].">";
	}

	echo $j;
	if (!isset($_REQUEST['p']) || $_REQUEST['p']<>$j)//если ссылки страниц не активированны или страница не равна активной то создаем на нее  ссылку
	{
	echo "</a>";
	}
	echo "] ";
	}
	}
	echo "<br><br></font>";
	if (isset($_REQUEST['p'])) //если активирована ссылки страницы
	{
	$xx=($_REQUEST['p']-1)*$gran;
	}
	else {
	$xx=0;
	}

$a=mysql_qw('select '.$GLOBALS["table_Traf"].'.name, '.$GLOBALS["table_Traf"].'.description, '.$GLOBALS["table_Traf"].'.cost, '.$GLOBALS["table_Traf"].'.branch, '.$GLOBALS["table_Traf"].'.id as ids from '.$GLOBALS["table_Traf"].' '.$ends.' limit ?, ?',$xx,$gran)or die ("Не удалось добавить запись: ".mysql_error());
//$a=mysql_query("select ".$GLOBALS["table_Traf"].".name, ".$GLOBALS["table_Traf"].".description, ".$GLOBALS["table_Traf"].".cost, ".$GLOBALS["table_Traf"].".branch, ".$GLOBALS["table_Traf"].".id as ids from ".$GLOBALS["table_Traf"]." ".$ends." limit ".$xx.", ".$gran) or die(mysql_error());
$str="";
$str.="<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\"  name=\"self\">";
$str.="<input type=\"hidden\" name=\"action\" value=\"delid\">";
$str.="<input type=\"hidden\" name=\"section\" value=\"traf\">";

$str.="<center><table width=100% cellspacing=0 cellpadding=0 bgcolor=white border=1 align=center topmargin=0 marginwidth=0>";
$str.="<tr  bgcolor='#66FFFF'><td><b>Название тарифа</b> <a href='".$_SERVER['PHP_SELF']."?section=traf&col=name&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=traf&col=name&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></td><td><b>Описание тарифа</b> <a href='".$_SERVER['PHP_SELF']."?section=traf&col=description&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=traf&col=description&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></td><td><b>Филиал</b> <a href='".$_SERVER['PHP_SELF']."?section=traf&col=branch&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=traf&col=branch&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></td><td><b>Стоимость тарифа</b> <a href='".$_SERVER['PHP_SELF']."?section=traf&col=cost&sort=down'  title='Сортировать по убыванию'><img name='down' src='images/down.png' border='0'></a>&nbsp;<a href='".$_SERVER['PHP_SELF']."?section=traf&col=cost&sort=up'  title='Сортировать по возрастанию'><img name='up' src='images/up.png' border='0'></a></td><td><b>Действия</b></td></tr>";
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)   //выбор строчек по очередно из массива
	 {
	 $str.="<tr><td>".$b['name']."</td><td>".$b['description']."</td><td>".whatCombo($b['branch'])."</td><td>".$b['cost']."</td><td><a href=".$_SERVER['PHP_SELF']."?section=traf&action=copy&id=".$b['ids']." title='Копировать'><img name='copy' src='images/copy.png' border='0'></a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=traf&action=change&id=".$b['ids']."  title='Редактировать'><img name='del' src='images/edit.png' border='0'></a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=traf&action=del&id=".$b['ids']."  title='Удалить'><img name='del' src='images/drop.png' border='0'></a>&nbsp; <input type='checkbox' name='itemsID[]' value=".$b['ids']."></td></tr>";
	 }
$str.="</table></center><br /><a href=".$_SERVER['PHP_SELF']."?section=traf&action=add>Добавить</a>&nbsp; <a href=".$_SERVER['PHP_SELF']."?section=traf&action=delall>Удалить все</a>";
$str.="<div align='right'><input type=\"submit\" name=\"done\" value=\"Удалить отмеченные\"><input type=\"reset\" value=\"Сбросить\"><br></div></form>";
return $str;
}

function delAllAkc()
{
$a=mysql_qw('select id from '.$GLOBALS["table_Dis"].' where isoption=1')or die ("Не удалось добавить запись: ".mysql_error());
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)   //выбор строчек по очередно из массива
	 {
	 $id=$b['id'];
	 if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			mysql_qw('delete from '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
	 }
//mysql_query("truncate ".$GLOBALS["table_Dis"]);
	echo "<html><body><center><h1>Акции удалены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=akc\">Назад</a></center></body></html>";
}
function delAllDis()
{

$a=mysql_qw('select id from '.$GLOBALS["table_Dis"].' where isoption=0')or die ("Не удалось добавить запись: ".mysql_error());
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)   //выбор строчек по очередно из массива
	 {
	 $id=$b['id'];
	 if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			mysql_qw('delete from '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
	 }

    //mysql_query("truncate ".$GLOBALS["table_Dis"]);
	echo "<html><body><center><h1>Скидки удалены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
}

function delAllTraf()
{
	mysql_qw('truncate '.$GLOBALS["table_Traf"])or die ("Не удалось добавить запись: ".mysql_error());
	//mysql_query("truncate ".$GLOBALS["table_Traf"]);
	echo "<html><body><center><h1>Тарифы удалены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
}
function delTraf($id)
{ 
			if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			mysql_qw('delete from '.$GLOBALS["table_Traf"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
//mysql_query("delete from ".$GLOBALS["table_Traf"]."  where id='".$id."'")or die(mysql_error());
	echo "<html><body><center><h1>Тариф удален.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
	}
function delIdTraf()
{ 	
if (isset($_REQUEST['itemsID']) )
		 {
	$mas=$_REQUEST['itemsID'];
	foreach ($mas as $val=>$id)
	{
			if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			mysql_qw('delete from '.$GLOBALS["table_Traf"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
			//mysql_query("delete from ".$GLOBALS["table_Traf"]."  where id='".$id."'")or die(mysql_error());
	}	echo "<html><body><center><h1>Тарифы удалены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
	}
	else
	{
	echo "<html><body><center><h1>Тарифы не удалены. Не были отмечены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
	}
}
function delIdAkc()
{ 
if (isset($_REQUEST['itemsID']) )
		 {
	$mas=$_REQUEST['itemsID'];
	foreach ($mas as $val=>$id)
	{
			if (ini_get("magic_quotes_gpc"))
			{
				$id=stripslashes($id);
			}
			mysql_qw('delete from '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
			//mysql_query("delete from ".$GLOBALS["table_Dis"]."  where id='".$id."'")or die(mysql_error());
	}
	echo "<html><body><center><h1>Акции удалены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=akc\">Назад</a></center></body></html>";
	}
	else
	{
	echo "<html><body><center><h1>Акции не удалены. Не были отмечены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=akc\">Назад</a></center></body></html>";
	}
	
	}
function delIdDis()
{ 
if (isset($_REQUEST['itemsID']) )
		 {
	$mas=$_REQUEST['itemsID'];
	foreach ($mas as $val=>$id)
	{
	
		if (ini_get("magic_quotes_gpc"))
		{
			$id=stripslashes($id);
		}
		mysql_qw('delete from '.$GLOBALS["table_Dis"].'  where id=?',$id)or die ("Не удалось добавить запись: ".mysql_error());
		//mysql_query("delete from ".$GLOBALS["table_Dis"]."  where id='".$id."'")or die(mysql_error());
			
	}
	echo "<html><body><center><h1>Скидки удалены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
	}
	else
	{
	echo "<html><body><center><h1>Скидки не удалены. Не были отмечены.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=dis\">Назад</a></center></body></html>";
	}
	}
		
	
	function addTrafForm()
	{
		echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\"  name=\"self\"  onsubmit=\"return check(document.self);\" >";
		echo "Название: <input type=\"text\" name=\"name\"><br>";
		echo "Описание:<br><textarea rows=7 cols=75 name=\"description\"></textarea><br>";
		$select=printCombo(0);
		echo "Филиал: ".$select."<br />";
		echo "Цена:<input type=\"text\" name=\"cost\"><br>";
		echo "<input type=\"submit\" name=\"done\" value=\"Добавить\"><br>";
		echo "<input type=\"reset\" value=\"Сбросить\"><br>";
		echo "<input type=\"hidden\" name=\"action\" value=\"add\">";
		echo "<input type=\"hidden\" name=\"section\" value=\"traf\">";
		echo "</form>";
	}
		function addTraf()
	{
	
	
	if (ini_get("magic_quotes_gpc"))
	{
	$_REQUEST=array_map('stripslashes',$_REQUEST);
	}
	mysql_qw('INSERT INTO '.$GLOBALS["table_Traf"].'  SET   name=?, description=?, cost=?, branch=?',$_REQUEST['name'],$_REQUEST['description'],$_REQUEST['cost'],$_REQUEST['branch'])or die ("Не удалось добавить запись: ".mysql_error());
	
/*if (!get_magic_quotes_gpc())
   {
   $_REQUEST['name']=mysql_escape_string($_REQUEST['name']);
   $_REQUEST['description']=mysql_escape_string($_REQUEST['description']);
   }
	mysql_query("INSERT INTO ".$GLOBALS["table_Traf"]."  SET   name='".$_REQUEST['name']."', description='".$_REQUEST['description']."', cost='".$_REQUEST['cost']."',branch='".$_REQUEST['branch']."'")or die ("Не удалось добавить запись: ".mysql_error());
	*/
	
	echo "<html><body><center><h1>Тариф добавлен.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?section=traf\">Назад</a></center></body></html>";
	}
	function printCombo($idcentr)
	{
	$a=mysql_qw('select * from '.$GLOBALS["table_Center"])or die ("Не удалось добавить запись: ".mysql_error());
	//$a=mysql_query("select * from ".$GLOBALS["table_Center"]) or die(mysql_error());
$b=array();
$last_id=0;
$str="<select name='branch'>";
$str.="<option  value='0'>Не выбран</option>";
while (($b=mysql_fetch_assoc($a))!==false)
{
if (($b['id']=='7')||($b['id']=='8'))continue;
if ($idcentr==$b['id'])
{
$str.="<option  value='".$b['id']."' selected >".$b['title']."</option>";
}
else
{
$str.="<option  value='".$b['id']."' >".$b['title']."</option>";
}
}
$str.="</select>";
return $str;
	}
	function whatCombo($idcentr)
	{
	

	if (ini_get("magic_quotes_gpc"))
	{
	$idcentr=stripslashes($idcentr);
	}
		if ($idcentr==0) return "Не выбран";
	$a=mysql_qw('select * from '.$GLOBALS["table_Center"].'  where id=?',$idcentr)or die ("Не удалось добавить запись: ".mysql_error());
	//$a=mysql_query("select * from ".$GLOBALS["table_Center"]." where id='".$idcentr."'") or die(mysql_error());
	$num=mysql_num_rows ($a);
	if ($num==0)return "Не выбран";
	$b=array();
	$b=mysql_fetch_assoc($a);
	return $b['title'];
	}
?>
