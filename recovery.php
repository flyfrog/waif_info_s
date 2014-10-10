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

/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
 mysql_select_db($dbName) or die(mysql_error());  

$query = "SELECT * FROM  $userstable WHERE id_mark='".$_POST['id_']."'"; 
$res = mysql_query($query) or die(mysql_error()); //проверим если совпадения
$number = mysql_num_rows($res); 
$row=mysql_fetch_array($res);
if($number==1){//если есть запись
 
if($rule==3){//если есть права необходимые


$json_string  =  $row["json_body"];

$json_body =  json_decode($json_string );
$json_body->delite_flag = 0;
$json_body->myname = $user; 
$json_string = json_encode($json_body,JSON_UNESCAPED_UNICODE);
$query = "UPDATE $userstable SET user_name='".$user."' , status='0' , json_body='".$json_string."' WHERE id_mark='".$_POST['id_']."'";

mysql_query($query) or die( mysql_error());
 
echo "Востановленно";
}


 

mysql_close();

}else{
echo "Записи не существует, удалят нечего"; 
}


 
?>