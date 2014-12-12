<?php
$hostname="localhost";
$db="mclub";

$table_Login="ibf_logins_mailing";
$table_Topics="ibf_topics";
$table_Posts="ibf_posts";

$username="root";
$pass="gfhnythd";
mysql_connect($hostname,$username,$pass) or die ("Не удалось соединиться: ".mysql_error()); 
mysql_query('SET NAMES utf8');
mysql_select_db($db) or die("Не удалось соединиться: ".mysql_error());  
?>