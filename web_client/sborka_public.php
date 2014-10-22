<?php
 
include "rule.php";


$userstable = "body"; 
 
 
 
 //echo   $_POST['id_'] . '|  |'. $_POST['region_']."|    |".$_POST['body_'];
 
 mysql_connect($hostname,$username,$password) or die("No connection"); 
 mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

 
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
 mysql_select_db($dbName) or die(mysql_error());  
 
 
$query = "SELECT * FROM  $userstable WHERE   status='0' AND hidden_flag='0'   " ;//выберем все с базы 
 
 
$res_body = mysql_query($query) or die(mysql_error()); //проверим если совпадения
$number_body = mysql_num_rows($res_body); // сколько резльтатов пришло
 
//echo gettype($_POST['number_']) . "   " . gettype($number_body);
if($number_body>=1){
  $key=0;
  $arr_json = array();

  	while ($row_body=mysql_fetch_array($res_body)) { 
    	$arr_json[$key]=str_replace("&quot;","'",$row_body['json_body']);   		 
  		$key++;
  	}//while 

echo    implode("$~*~$",$arr_json); 
mysql_close();
} 
 

 
?>