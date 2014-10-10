<?php
 

 session_start();
$hostname = "localhost"; 
$username = "root"; 
$password = "frog555"; 
$dbName = "test"; 
$userstable = "body"; 
$regionstable = "regions"; 
$user = $_SESSION["login"];
$rule = $_SESSION["rule"];
 
 //echo   $_POST['id_'] . '|  |'. $_POST['region_']."|    |".$_POST['body_'];
 
 mysql_connect($hostname,$username,$password) or die("No connection"); 
 mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

 
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
 mysql_select_db($dbName) or die(mysql_error());  

$query = "SELECT id FROM  $regionstable WHERE name_region='".$_POST['region_']."' OR city_name='".$_POST['region_']."'"; 
$res_region = mysql_query($query) or die(mysql_error()); //проверим если совпадения
$number_region = mysql_num_rows($res_region); // сколько резльтатов пришло
$row_region=mysql_fetch_array($res_region);
$region_id = $row_region["id"];
 
if($number_region>=1){ //если есть запись нужный регион

$query="";
if($rule!=3){ // выборка без заявок на удаление
$query = "SELECT * FROM  $userstable WHERE id_region='".$region_id."' AND status='0' " ;//выберем все с базы 
}
if($rule==3){ // выборка  заявок на удаление
$query = "SELECT * FROM  $userstable WHERE id_region='".$region_id."' " ;//выберем все с базы 

}


$res_body = mysql_query($query) or die(mysql_error()); //проверим если совпадения
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


}else{

  	
}//end if


 
mysql_close();

 

 
?>