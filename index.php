<?php
ini_set("session.gc_maxlifetime", "3600");
$expireTime = 60*60;
session_set_cookie_params($expireTime);
session_start();
header("Content-Type: text/html; charset=UTF-8");
require_once "lib/connect.php";
require_once "lib/mysql_qw.php";
require_once "model/model.php";
require_once "lib/lib.php";
require_once "lib/auth.php";

switch ($_SESSION['group'])
{
case "ADM":
require_once "view/header_adm.php";
if (isset($_REQUEST['action']))
{
$ACTION=$_REQUEST['action'];
if ($ACTION=="changeteacher") {
if (isset($_REQUEST['done']) ){$res=changeTeacher($_REQUEST,$_REQUEST['id']); $text="<center><h1>Преподаватель изменен.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?action=viewteacher\">Назад</a></center>";if ($res)require_once"view/done.php";}else
				{
				$id=$_REQUEST['id'];
				$mas_teacher=selectTeacherId($id);
				require_once "view/change_teacher_adm.php";
				}}
if ($ACTION=="removeteacher") {
				$res=removeTeacher($_REQUEST['id']);
				 $text="<center><h1>Преподаватель удален.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?action=viewteacher\">Назад</a></center>";
				 if ($res)require_once "view/done.php";
			}	
if ($ACTION=="viewteacher") {
							$mas_teacher=selectTeacher();
								require_once "view/view_teacher_adm.php";
			}
if ($ACTION=="changeumk") {
if (isset($_REQUEST['done']) ){$res=changeUmk($_REQUEST,$_REQUEST['id']); $text="<center><h1>УМК изменен.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?action=viewumk\">Назад</a></center>";if ($res)require_once"view/done.php";}else
				{
				$id=$_REQUEST['id'];
				$mas_umk=selectUmkId($id);
				require_once "view/change_umk_adm.php";
				}}
if ($ACTION=="removeumk") {
				$res=removeUmk($_REQUEST['id']);
				 $text="<center><h1>УМК удален.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?action=viewumk\">Назад</a></center>";
				 if ($res)require_once "view/done.php";
			}	
if ($ACTION=="viewumk") {
							$mas_umk=selectUmk();
								require_once "view/view_umk_adm.php";
			}
			
if ($ACTION=="changesubj") {
if (isset($_REQUEST['done']) ){$res=changeSubject($_REQUEST,$_REQUEST['id']); $text="<center><h1>Предмет изменен.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?action=viewsubj\">Назад</a></center>";if ($res)require_once"view/done.php";}else
				{
				$id=$_REQUEST['id'];
				$mas_subject=selectSubjectId($id);
				require_once "view/change_subject_adm.php";
				}
}			
if ($ACTION=="removesubj") {
				$res=removeSubject($_REQUEST['id']);
				 $text="<center><h1>Предмет удален.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?action=viewsubj\">Назад</a></center>";
				 if ($res)require_once "view/done.php";
			}	
if ($ACTION=="viewsubj") {
							$mas_subject=selectSubject();
								require_once "view/view_subject_adm.php";
				
			}
if ($ACTION=="createsubj") {
				if (isset($_REQUEST['done']) ){$res=addSubject($_REQUEST); $text="<center><h1>Предмет добавлен.</h1><br><a href=\"". $_SERVER['PHP_SELF']."?action=viewsubj\">Назад</a></center>";if ($res)require_once"view/done.php";}else
				{
				require_once "view/create_subject_adm.php";
				}
			}
				if ($ACTION=="create") {
				if (isset($_REQUEST['done']) ){$res=addRequestMAN($_REQUEST,$_REQUEST['branch']); $text="<center><h1>Заявка добавлена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}else
				{
				$mas_branch=selectCenter_3();
				if (isset($_REQUEST['branches'])){$mas_client=selectClient($_REQUEST['branches']);}else{$_REQUEST['branches']="1";$mas_client=selectClient($_REQUEST['branches']);}
				//$mas_client=selectClient_2();
				$mas_subject=selectSubject();
				$mas_umk=selectUmk();
				$mas_teacher=selectTeacher();
				require_once "view/create_request_adm.php";
				}
			}
			if ($ACTION=="change") {
				if (isset($_REQUEST['done']) ){$res=changeRequestADM($_REQUEST,$_REQUEST['id']); $text="<center><h1>Заявка изменена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}else{
				
				$mas_umk=selectUmk();$mas_teacher=selectTeacher();$mas_umk2=selectUmk();$mas_teacher2=selectTeacher();$mas_request=selectRequest($_REQUEST['id']);$id=$_REQUEST['id'];	
				$mas_branch=selectCenter_3();
				if (isset($_REQUEST['branches'])){$mas_client=selectClient($_REQUEST['branches']);}else{$_REQUEST['branches']=$mas_request["branch"];$mas_client=selectClient($_REQUEST['branches']);}
				require_once "view/change_request_adm.php";}
			}	
			if ($ACTION=="changestatusumk") {
				if (isset($_REQUEST['type']) ){$res=changeStatusUMK($_REQUEST['type'],$_REQUEST['id']); $text="<center><h1>Статус изменен .</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}
			}	
				if ($ACTION=="changestatusteacher") {
				if (isset($_REQUEST['type']) ){$res=changeStatusTEA($_REQUEST['type'],$_REQUEST['id']); $text="<center><h1>Статус изменен .</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}
			}
			if ($ACTION=="remove") {
				$res=removeRequest($_REQUEST['id']);
				 $text="<center><h1>Заявка удалена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";
				 if ($res)require_once "view/done.php";
			}	
			if ($ACTION=="exit") {
			 LogOut();
			 $text="Работа завершена<a href=\"". $_SERVER['PHP_SELF']."\">Войти снова.</a>";
				require_once "view/done.php";
			}	
}
else
{
if (isset($_REQUEST['select']))
{
$mas_request=selectRequestTEA_NOALL($_REQUEST);
}
else
{
$mas_request=selectRequestTEA();
}
$mas_client=selectClient_2();
$mas_branch=selectCenter_3();
$mas_subject=selectSubject();
$mas_umk=selectUmk();
$mas_teacher=selectTeacher();
//print_r(mysql_fetch_assoc($mas_request));
require_once "view/view_request_adm.php";
}


require_once "view/footer.php";
break;
case "TEA":
require_once "view/header_tea.php";
if (isset($_REQUEST['action']))
{
$ACTION=$_REQUEST['action'];

			if ($ACTION=="change") {
				if (isset($_REQUEST['done']) ){$res=changeRequestTEA($_REQUEST,$_REQUEST['id']); $text="<center><h1>Заявка изменена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}else{$mas_umk=selectUmk();$mas_teacher=selectTeacher();$mas_umk2=selectUmk();$mas_teacher2=selectTeacher();$mas_request=selectRequest($_REQUEST['id']);$id=$_REQUEST['id'];require_once "view/change_request_tea.php";}
			}	
			if ($ACTION=="changestatusumk") {
				if (isset($_REQUEST['type']) ){$res=changeStatusUMK($_REQUEST['type'],$_REQUEST['id']); $text="<center><h1>Статус изменен .</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}
			}	
				if ($ACTION=="changestatusteacher") {
				if (isset($_REQUEST['type']) ){$res=changeStatusTEA($_REQUEST['type'],$_REQUEST['id']); $text="<center><h1>Статус изменен .</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}
			}
			if ($ACTION=="remove") {
				if (isset($_REQUEST['done']) ){require_once "view/done.php";}
			}	
			if ($ACTION=="exit") {
			 LogOut();
			 $text="Работа завершена<a href=\"". $_SERVER['PHP_SELF']."\">Войти снова.</a>";
				require_once "view/done.php";
			}	
}
else
{
if (isset($_REQUEST['select']))
{
$mas_request=selectRequestTEA_NOALL($_REQUEST);
}
else
{
$mas_request=selectRequestTEA();
}
$mas_client=selectClient_2();
$mas_branch=selectCenter_3();
$mas_subject=selectSubject();
$mas_umk=selectUmk();
$mas_teacher=selectTeacher();
//print_r(mysql_fetch_assoc($mas_request));
require_once "view/view_request_tea.php";
}
require_once "view/footer.php";
break;
case "MAN":
require_once "view/header_man.php";
if (isset($_REQUEST['action']))
{
$ACTION=$_REQUEST['action'];
			if ($ACTION=="create") {
				if (isset($_REQUEST['done']) ){$res=addRequestMAN($_REQUEST,$_SESSION['branch']); $text="<center><h1>Заявка добавлена.</h1><br><a href=\"". $_SERVER['PHP_SELF']."\">Назад</a></center>";if ($res)require_once"view/done.php";}else{$mas_client=selectClient($_SESSION['branch']);$mas_subject=selectSubject();$mas_umk=selectUmk();$mas_teacher=selectTeacher();require_once "view/create_request_man.php";}
			}
			if ($ACTION=="change") {
				if (isset($_REQUEST['done']) ){require_once "view/done.php";}else{require_once "view/change_request_man.php";}
			}	
			if ($ACTION=="remove") {
				if (isset($_REQUEST['done']) ){require_once "view/done.php";}
			}	
			if ($ACTION=="exit") {
			 LogOut();
			 $text="Работа завершена<a href=\"". $_SERVER['PHP_SELF']."\">Войти снова.</a>";
				require_once "view/done.php";
			}	
}
else
{
$mas_request=selectRequestMAN($_SESSION['branch']);

//print_r(mysql_fetch_assoc($mas_request));
require_once "view/view_request_man.php";
}
require_once "view/footer.php";
break;
default:
echo "Ошибка!";
break;
}


?>