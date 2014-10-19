<?php
 

 session_start();
include "rule.php";
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
 
if($rule==3||$row["user_name"]==$user){//если есть права необходимые

if($rule==3){ // если ты супер админ удалить метку
 $query = "DELETE FROM $userstable WHERE id_mark='".$_POST["id_"]."'";
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
mysql_query($query) or die( mysql_error());
echo "Успешно удалил";
exit();

}//if
if($row["user_name"]==$user){ //если есть нет прав сделать заявку на удаление
//поменяем hidden flag
$kill_him = array('"',"'","\n","\r");//ключи для замены в данных от клиента
$kill_then = array('&quot;',"&quot;","<br>","<br>");//ключи для замены в данных от клиента

$json_string  =  $row["json_body"];
$json_string =  json_decode($json_string);

$json_string->id  = str_replace( $kill_him,$kill_then,$json_string->id);
$json_string->names  = str_replace( $kill_him,$kill_then,$json_string->names);
$json_string->detail  = str_replace( $kill_him,$kill_then,$json_string->detail);
$json_string->adress  = str_replace( $kill_him,$kill_then,$json_string->adress);
$json_string->phone  = str_replace( $kill_him,$kill_then,$json_string->phone);
$json_string->site  = str_replace( $kill_him,$kill_then,$json_string->site);
$json_string->e_mail  = str_replace( $kill_him,$kill_then,$json_string->e_mail);
//$json_string->types  = str_replace( $kill_him,"&quot;",$json_string->types);
$json_string->hidden_flag  = str_replace( $kill_him,$kill_then,$json_string->hidden_flag);
$json_string->delite_flag  = str_replace( $kill_him,$kill_then,$json_string->delite_flag);
$json_string->region  = str_replace( $kill_him,$kill_then,$json_string->region);


$json_string->delite_flag = 1;
$json_string = json_encode($json_string,JSON_UNESCAPED_UNICODE);
$query = "UPDATE $userstable SET status='1' , json_body='".$json_string."' WHERE id_mark='".$_POST['id_']."'";

mysql_query($query) or die( mysql_error());
echo "Заявка на удаление принята";

}


}else{ 
echo "Нет прав на изменение записи";
}

mysql_close();

}else{
echo "Удалено"; 
}


 
?>