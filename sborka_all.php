<?php
 

 session_start();
$hostname = "localhost"; 
$username = "root"; 
$password = "frog555"; 
$dbName = "test"; 
$userstable = "body"; 
$user = $_SESSION["login"];
$rule = $_SESSION["rule"];
 
 //echo   $_POST['id_'] . '|  |'. $_POST['region_']."|    |".$_POST['body_'];
 
 mysql_connect($hostname,$username,$password) or die("No connection"); 
 mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
 mysql_select_db($dbName) or die(mysql_error()); 

if($rule!=3){ // выборка без заявок на удаление
$query = "SELECT * FROM  $userstable WHERE status='0' " ;//выберем все с базы 
}
if($rule==3){ // выборка на удаление
$query = "SELECT * FROM  $userstable " ;//выберем все с базы 
}

$res_body = mysql_query($query) or die(mysql_error()); 
$number_body = mysql_num_rows($res_body); // сколько резльтатов пришло
 
if($number_body>=1){
  $key=0;
  $arr_json = array();

  	while ($row_body=mysql_fetch_array($res_body)) { 
    	$arr_json[$key]=str_replace("&quot;","'",$row_body['json_body']);   		 
  		$key++;
  	}//while 
	 echo    implode("$~*~$",$arr_json); 
 

  }else{echo "нет записей";}

mysql_close();

 

 
?>