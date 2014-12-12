 <?php
 
 function SELECT_LOGINS_MAILING($login,$password)
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Login"].'  where login=? and password=?',$login,$password) or die(mysql_error());
$count=mysql_num_rows($a);
if ($count==0) return false;
$b=mysql_fetch_assoc($a);
return $b;
 }
 
 
 function SELECT_FROM_CENTER_3()
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Center"]) or die(mysql_error());
return $a;
 }
function SELECT_FROM_CENTER_2($login,$password)
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Center"].'  where login=? and password=?',$login,$password) or die(mysql_error());
$count=mysql_num_rows($a);
if ($count==0) return false;
$b=mysql_fetch_assoc($a);
return $b;
 }
 function SELECT_FROM_CENTER_1($login)
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Center"].'  where login=?',$login) or die(mysql_error());
$count=mysql_num_rows($a);
if ($count==0) return false;
$b=mysql_fetch_assoc($a);
return $b;
 }  
  function SELECT_FROM_CLIENT($branch)
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Admin"].' where center_id=? and active="1" order by name',$branch) or die(mysql_error());
return $a;
 }  
   function SELECT_FROM_CLIENT_2()
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Admin"].' where active="1" order by name') or die(mysql_error());
return $a;
 } 
  function SELECT_FROM_SUBJECT()
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Subj"].' order by subject') or die(mysql_error());
return $a;
 }  
  function SELECT_FROM_TEACHER_ID($id)
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Teacher"].' where id=? ',$id) or die(mysql_error());
$count=mysql_num_rows($a);
if ($count==0) return false;
$b=mysql_fetch_assoc($a);
return $b;
 }  
  function UPDATE_FROM_TEACHER_ID($teacher,$id)
{
 $a=mysql_qw('UPDATE '.$GLOBALS["table_Teacher"].' SET name=? where id=?',$teacher,$id) or die(mysql_error());
return $a;
 }  
  function SELECT_FROM_UMK_ID($id)
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Umk"].' where id=? ',$id) or die(mysql_error());
$count=mysql_num_rows($a);
if ($count==0) return false;
$b=mysql_fetch_assoc($a);
return $b;
 }  
  function UPDATE_FROM_UMK_ID($umk,$id)
{
 $a=mysql_qw('UPDATE '.$GLOBALS["table_Umk"].' SET name=? where id=?',$umk,$id) or die(mysql_error());
return $a;
 }  
  function SELECT_FROM_SUBJECT_ID($id)
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Subj"].' where id=? order by subject',$id) or die(mysql_error());
$count=mysql_num_rows($a);
if ($count==0) return false;
$b=mysql_fetch_assoc($a);
return $b;
 }  
  function UPDATE_FROM_SUBJECT_ID($subject,$id)
{
 $a=mysql_qw('UPDATE '.$GLOBALS["table_Subj"].' SET subject=? where id=?',$subject,$id) or die(mysql_error());
return $a;
 }  
   function SELECT_FROM_UMK()
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Umk"].' order by name') or die(mysql_error());
return $a;
 }  
   function SELECT_FROM_TEACHER()
{
$a=mysql_qw('SELECT *  FROM '.$GLOBALS["table_Teacher"].' order by name') or die(mysql_error());
return $a;
 }  
function INSERT_INTO_REQUEST_MAN($client, $category,$branch, $subject, $umk_last, $teacher_last, $level, $rasp, $date_begin, $count, $comment)
{

mysql_qw('INSERT INTO '.$GLOBALS["table_Req"].' SET client=?, category=?,branch=?, subject=?, umk_last=?, teacher_last=?, level=?, rasp=?, date_begin=?, count=?, comment=?, status_umk=1, status_teacher=1',$client, $category,$branch, $subject, $umk_last, $teacher_last, $level, $rasp, $date_begin, $count, $comment) or die(mysql_error());
$id=mysql_insert_id();
return $id;
 }  
function INSERT_INTO_UMK($name)
{

$a=mysql_qw('INSERT INTO '.$GLOBALS["table_Umk"].' SET name=?',$name) or die(mysql_error());
$id=mysql_insert_id();
return $id;
 }  
function INSERT_INTO_TEACHER($name)
{

mysql_qw('INSERT INTO '.$GLOBALS["table_Teacher"].' SET name=?',$name) or die(mysql_error());
$id=mysql_insert_id();
return $id;
 }  
 function SELECT_FROM_REQUEST_MAN($branch)
{
$tab1=$GLOBALS["table_Req"];
$tab2=$GLOBALS["table_Admin"];
$tab3=$GLOBALS["table_Center"];
$tab4=$GLOBALS["table_Subj"];
$tab5=$GLOBALS["table_Teacher"];
$tab6=$GLOBALS["table_Umk"];

$str1="tab1.id,tab1.date,tab2.name, tab1.category,tab3.title,tab4.subject,tab5.name as l_teacher,tab6.name as l_umk,tab1.level,tab1.rasp,tab1.date_begin,tab1.count,tab1.umk_future,tab1.teacher_future,tab1.comment,tab1.status_umk,tab1.status_teacher,tab1.date_change_umk,tab1.date_change_teacher";
$str2="tab0.id,tab0.date,tab0.name,tab0.category, tab0.title,tab0.subject,tab0.l_teacher,tab0.l_umk,tab0.level,tab0.rasp,tab0.date_begin,tab0.count,tab7.name as f_teacher,tab8.name as f_umk,tab0.comment,tab0.status_umk,tab0.status_teacher,tab0.date_change_umk,tab0.date_change_teacher";
$a=mysql_qw('SELECT '.$str2.' FROM (SELECT '.$str1.'  FROM '.$tab1.' as tab1 INNER JOIN '.$tab2.' as tab2 ON tab1.client=tab2.id  INNER JOIN '.$tab3.' as tab3 ON tab1.branch=tab3.id INNER JOIN '.$tab4.' as tab4 ON tab1.subject=tab4.id LEFT JOIN '.$tab5.'  as tab5 ON tab1.teacher_last=tab5.id LEFT JOIN '.$tab6.' as tab6 ON tab1.umk_last=tab6.id where tab1.branch=? order by tab1.date desc) as tab0 LEFT JOIN '.$tab5.'  as tab7 ON tab0.teacher_future=tab7.id LEFT JOIN '.$tab6.' as tab8 ON tab0.umk_future=tab8.id',$branch) or die(mysql_error());
//$a=mysql_qw('SELECT '.$str1.'  FROM '.$tab1.' as tab1 INNER JOIN '.$tab2.' as tab2 ON tab1.client=tab2.id  INNER JOIN '.$tab3.' as tab3 ON tab1.branch=tab3.id INNER JOIN '.$tab4.' as tab4 ON tab1.subject=tab4.id INNER JOIN '.$tab5.'  as tab5 ON tab1.teacher_last=tab5.id INNER JOIN '.$tab6.' as tab6 ON tab1.umk_last=tab6.id where tab1.branch=? order by tab1.date',$branch) or die(mysql_error());
return $a;
 }  
  function SELECT_FROM_REQUEST_TEA_NOALL($client,$category,$subject,$level,$rasp,$count,$status_umk,$status_teacher,$date0,$date1,$num0,$num1,$datecr0,$datecr1,$branch,$umk,$teacher)
{
$str_num='';
if ($num0!="")
{
	if ($num1!="")
	{
			$str_num=' (tab1.id between '.$num0.' and '.$num1.') and ';
	}else
	{
		$str_num=' tab1.id > '.$num0.' and';
	}
}else
{
		if ($num1!="")
	{
			$str_num=' tab1.id < '.$num1.' and';
	}
}
$str_date='';
if ($date0!="")
{
	if ($date1!="")
	{
			$str_date=' (tab1.date_begin between "'.$date0.'" and "'.$date1.'")  and';
	}else
	{
		$str_date=' tab1.date_begin  > "'.$date0.'" and';
	}
}else
{
		if ($date1!="")
	{
			$str_date=' tab1.date_begin  < "'.$date1.'" and';
	}
}
$str_datecr='';
if ($datecr0!="")
{
	if ($datecr1!="")
	{
			$str_datecr=' (tab1.date between "'.$datecr0.'" and "'.$datecr1.'") and';
	}else
	{
		$str_datecr=' tab1.date  > "'.$datecr0.'" and';
	}
}else
{
		if ($datecr1!="")
	{
			$str_datecr=' tab1.date  < "'.$datecr1.'" and';
	}
}
$str_client='';
if ($client!=-1)$str_client=' tab1.client='.$client.' and';
$str_category='';
//if ($category!="")$str_category=' tab1.category="'.$category.'" and';
if ($category!="")$str_category=' (tab1.category like "%'.$category.'%") and';
$str_subject='';
if ($subject!=-1)$str_subject=' tab1.subject='.$subject.' and';
$str_level='';
//if ($level!="")$str_level=' tab1.level="'.$level.'" and';
if ($level!="")$str_level=' (tab1.level like "%'.$level.'%") and';
$str_rasp='';
//if ($rasp!="")$str_rasp=' tab1.rasp="'.$rasp.'" and';
if ($rasp!="")$str_rasp=' (tab1.rasp like "%'.$rasp.'%") and';
$str_count='';
if ($count!="")$str_count=' tab1.count='.$count.' and';
$str_status_umk='';
if ($status_umk!=-1)$str_status_umk=' tab1.status_umk='.$status_umk.' and';
$str_status_teacher='';
if ($status_teacher!=-1)$str_status_teacher=' tab1.status_teacher='.$status_teacher.' and';
$str_branch='';
if ($branch!=-1)$str_branch=' tab1.branch='.$branch.' and';
$str_umk='';
if ($umk!=-1)$str_umk=' tab1.umk_last='.$umk_last.' and';
$str_teacher='';
if ($teacher!=-1)$str_teacher=' tab1.teacher_last='.$umk_teacher.' and';
$strquery='';
$strquery=$str_num.$str_datecr.$str_date.$str_client.$str_category.$str_subject.$str_level.$str_rasp.$str_count.$str_status_umk.$str_status_teacher.$str_branch.$str_umk.$str_teacher;

if ($strquery!='')
{
$start=strlen($strquery)-3;
$strquery=substr($strquery,0,$start);
//$strquery=str_replace($strquery,'',(int)strlen($strquery)-3+1,3);

$strquery=' where '.$strquery;
}
$tab1=$GLOBALS["table_Req"];
$tab2=$GLOBALS["table_Admin"];
$tab3=$GLOBALS["table_Center"];
$tab4=$GLOBALS["table_Subj"];
$tab5=$GLOBALS["table_Teacher"];
$tab6=$GLOBALS["table_Umk"];

$str1="tab1.id,tab1.date,tab2.name, tab1.category,tab3.title,tab4.subject,tab5.name as l_teacher,tab6.name as l_umk,tab1.level,tab1.rasp,tab1.date_begin,tab1.count,tab1.umk_future,tab1.teacher_future,tab1.comment,tab1.status_umk,tab1.status_teacher,tab1.date_change_umk,tab1.date_change_teacher";
$str2="tab0.id,tab0.date,tab0.name,tab0.category, tab0.title,tab0.subject,tab0.l_teacher,tab0.l_umk,tab0.level,tab0.rasp,tab0.date_begin,tab0.count,tab7.name as f_teacher,tab8.name as f_umk,tab0.comment,tab0.status_umk,tab0.status_teacher,tab0.date_change_umk,tab0.date_change_teacher";
$a=mysql_qw('SELECT '.$str2.' FROM (SELECT '.$str1.'  FROM '.$tab1.' as tab1 INNER JOIN '.$tab2.' as tab2 ON tab1.client=tab2.id  INNER JOIN '.$tab3.' as tab3 ON tab1.branch=tab3.id INNER JOIN '.$tab4.' as tab4 ON tab1.subject=tab4.id LEFT JOIN '.$tab5.'  as tab5 ON tab1.teacher_last=tab5.id LEFT JOIN '.$tab6.' as tab6 ON tab1.umk_last=tab6.id '.$strquery.' order by tab1.date desc) as tab0 LEFT JOIN '.$tab5.'  as tab7 ON tab0.teacher_future=tab7.id LEFT JOIN '.$tab6.' as tab8 ON tab0.umk_future=tab8.id') or die(mysql_error());
return $a;
}
  function SELECT_FROM_REQUEST_TEA()
{
$tab1=$GLOBALS["table_Req"];
$tab2=$GLOBALS["table_Admin"];
$tab3=$GLOBALS["table_Center"];
$tab4=$GLOBALS["table_Subj"];
$tab5=$GLOBALS["table_Teacher"];
$tab6=$GLOBALS["table_Umk"];

$str1="tab1.id,tab1.date,tab2.name, tab1.category,tab3.title,tab4.subject,tab5.name as l_teacher,tab6.name as l_umk,tab1.level,tab1.rasp,tab1.date_begin,tab1.count,tab1.umk_future,tab1.teacher_future,tab1.comment,tab1.status_umk,tab1.status_teacher,tab1.date_change_umk,tab1.date_change_teacher";
$str2="tab0.id,tab0.date,tab0.name,tab0.category, tab0.title,tab0.subject,tab0.l_teacher,tab0.l_umk,tab0.level,tab0.rasp,tab0.date_begin,tab0.count,tab7.name as f_teacher,tab8.name as f_umk,tab0.comment,tab0.status_umk,tab0.status_teacher,tab0.date_change_umk,tab0.date_change_teacher";
$a=mysql_qw('SELECT '.$str2.' FROM (SELECT '.$str1.'  FROM '.$tab1.' as tab1 INNER JOIN '.$tab2.' as tab2 ON tab1.client=tab2.id  INNER JOIN '.$tab3.' as tab3 ON tab1.branch=tab3.id INNER JOIN '.$tab4.' as tab4 ON tab1.subject=tab4.id LEFT JOIN '.$tab5.'  as tab5 ON tab1.teacher_last=tab5.id LEFT JOIN '.$tab6.' as tab6 ON tab1.umk_last=tab6.id order by tab1.date desc) as tab0 LEFT JOIN '.$tab5.'  as tab7 ON tab0.teacher_future=tab7.id LEFT JOIN '.$tab6.' as tab8 ON tab0.umk_future=tab8.id') or die(mysql_error());
return $a;
 }  
 function SELECT_FROM_REQUEST($id)
{
$tab1=$GLOBALS["table_Req"];
$a=mysql_qw('SELECT *  FROM '.$tab1.' where id=?',$id) or die(mysql_error());
$count=mysql_num_rows($a);
if ($count==0) return false;
$b=mysql_fetch_assoc($a);
return $b;
 }  
  function UPDATE_INTO_REQUEST_TEA_UMK($status_umk,$date_change_umk,$id)
  {
  $a=mysql_qw('UPDATE '.$GLOBALS["table_Req"].' SET status_umk=?, date_change_umk=? where id=?',$status_umk,$date_change_umk,$id) or die(mysql_error());

return $a;
  }
  function UPDATE_INTO_REQUEST_TEA_TEACHER($status_teacher,$date_change_teacher,$id)
  {
    $a=mysql_qw('UPDATE '.$GLOBALS["table_Req"].' SET status_teacher=?, date_change_teacher=? where id=?',$status_teacher,$date_change_teacher,$id) or die(mysql_error());

return $a;
  }
  function UPDATE_INTO_REQUEST_TEA($category, $umk, $teacher, $level, $rasp, $date, $count, $comment,$f_umk,$f_teacher,$id)
  {
 $a= mysql_qw('UPDATE '.$GLOBALS["table_Req"].' SET category=?,umk_last=?, teacher_last=?, level=?, rasp=?, date_begin=?, count=?, comment=?,umk_future=?, teacher_future=? where id=?',$category, $umk, $teacher, $level, $rasp, $date, $count, $comment,$f_umk,$f_teacher,$id) or die(mysql_error());

return $a;
  
  }
 function UPDATE_INTO_REQUEST_ADM($branch,$client,$category, $umk, $teacher, $level, $rasp, $date, $count, $comment,$f_umk,$f_teacher,$id)
  {
 $a= mysql_qw('UPDATE '.$GLOBALS["table_Req"].' SET branch=?,client=?,category=?,umk_last=?, teacher_last=?, level=?, rasp=?, date_begin=?, count=?, comment=?,umk_future=?, teacher_future=? where id=?',$branch,$client,$category, $umk, $teacher, $level, $rasp, $date, $count, $comment,$f_umk,$f_teacher,$id) or die(mysql_error());

return $a;
  
  }
   function   REMOVE_REQUEST($id){
    $a= mysql_qw('delete from '.$GLOBALS["table_Req"].'  where id=?',$id)or die ("?? ??????? ???????? ??????: ".mysql_error());
	return $a;
   }
     function  REMOVE_SUBJECT($id)
	 {
	     $a= mysql_qw('delete from '.$GLOBALS["table_Subj"].'  where id=?',$id)or die ("?? ??????? ???????? ??????: ".mysql_error());
	return $a;
	 }
	  function  REMOVE_UMK($id)
	 {
	     $a= mysql_qw('delete from '.$GLOBALS["table_Umk"].'  where id=?',$id)or die ("?? ??????? ???????? ??????: ".mysql_error());
	return $a;
	 }
	 	  function  REMOVE_TEACHER($id)
	 {
	     $a= mysql_qw('delete from '.$GLOBALS["table_Teacher"].'  where id=?',$id)or die ("?? ??????? ???????? ??????: ".mysql_error());
	return $a;
	 }
function INSERT_INTO_SUBJECT($subject)
{

mysql_qw('INSERT INTO '.$GLOBALS["table_Subj"].' SET subject=?',$subject) or die(mysql_error());
$id=mysql_insert_id();
return $id;
 }  
 ?>