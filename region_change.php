<?php
 

 session_start();
$hostname = "localhost"; 
$username = "root"; 
$password = "frog555"; 
$dbName = "test"; 
$userstable = "body"; 

$user = $_SESSION["login"];
$rule = $_SESSION["rule"];
 
 
 mysql_connect($hostname,$username,$password) or die("No connection"); 
 mysql_query("SET NAMES utf8");
 mysql_query("SET COLLATION_CONNECTION=utf8_bin");
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
 mysql_select_db($dbName) or die(mysql_error());  

$query = "SELECT * FROM  $userstable";//выберем все с базы 
$res = mysql_query($query) or die(mysql_error()); //проверим если совпадения
$number = mysql_num_rows($res); // сколько резльтатов пришло
 
if($number>=1){ //если есть запись

  $key=0;
  $arr_json = array();

  	while ($row=mysql_fetch_array($res)) { 
    	$arr_json[$key]=str_replace("&quot;","'",$row['json_body']); 
  		

  		 
  		$key++;
  	}//while 
	 echo    implode("$~*~$",$arr_json); 

}else{

  	echo "нет записей";
}//end if


 
mysql_close();

 

 
?>