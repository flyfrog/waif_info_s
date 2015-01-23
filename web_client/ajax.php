<?php
 

 session_start();
include "rule.php";




$userstable = "body"; 
$region = "regions"; 
$user = $_SESSION["login"];
$rule = $_SESSION["rule"];
 
 
$region_id=0; 
 //echo   $_POST['id_'] . '|  |'. $_POST['region_']."|    |".$_POST['body_'];
 
 mysql_connect($hostname,$username,$password) or die("No connection"); 
 //mysql_query("SET NAMES utf8");
 //mysql_query("SET COLLATION_CONNECTION=utf8_bin");
 
 
 mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
 mysql_select_db($dbName) or die(mysql_error());  

$query = "SELECT * FROM  $userstable WHERE id_mark='".$_POST['id_']."'"; 
$res = mysql_query($query) or die(mysql_error()); //проверим если совпадения
$number_id = mysql_num_rows($res); 
$row=mysql_fetch_array($res);
//----------------------------------------------------------------------------
if(strpos($_POST["region_"],"'")!=-1){// проверка на '
$query = "SELECT id FROM  $region WHERE name_region='".$_POST['region_']."' OR city_name='".$_POST['region_']."'"; 
$res_region = mysql_query($query) or die(mysql_error()); //проверим если совпадения
$number_region = mysql_num_rows($res_region); 
$row_region=mysql_fetch_array($res_region);
$region_id = $row_region["id"];
}else{//если регион с '

echo "регеон не верен";
mysql_close();
}//конец проверки на '
//------------------------------------------------------------------------------
if($number_id==1){//если есть запись
 
 $json_string =  json_decode($_POST["body_"]);

$kill_him = array('"',"'","\n","\r");//ключи для замены в данных от клиента
$kill_then = array('&quot;',"&quot;","<br>","<br>");//ключи для замены в данных от клиента

$json_string->id  = str_replace( $kill_him,$kill_then,$json_string->id);
$json_string->names  = str_replace( $kill_him,$kill_then,$json_string->names);
$json_string->detail  = str_replace( $kill_him,$kill_then,$json_string->detail);
$json_string->times  = str_replace( $kill_him,$kill_then,$json_string->times);
$json_string->adress  = str_replace( $kill_him,$kill_then,$json_string->adress);
$json_string->phone  = str_replace( $kill_him,$kill_then,$json_string->phone);
$json_string->site  = str_replace( $kill_him,$kill_then,$json_string->site);
$json_string->e_mail  = str_replace( $kill_him,$kill_then,$json_string->e_mail);
//$json_string->types  = str_replace( $kill_him,"&quot;",$json_string->types);
$json_string->hidden_flag  = str_replace( $kill_him,$kill_then,$json_string->hidden_flag);
$json_string->delite_flag  = str_replace( $kill_him,$kill_then,$json_string->delite_flag);
$json_string->region  = str_replace( $kill_him,$kill_then,$json_string->region);
$hidden_flag = $json_string->hidden_flag;
$json_string->myname = $user;

$json_string = json_encode($json_string,JSON_UNESCAPED_UNICODE);


 
if($rule>=2&&$row["user_name"]!=$user||$row["user_name"]==$user){//если есть права необходимые
$query = "UPDATE $userstable SET  user_name='".$user."',id_region='".$region_id."' ,  json_body='".$json_string."', hidden_flag='".$hidden_flag ."' WHERE id_mark='".$_POST['id_']."'";
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
mysql_query($query) or die( mysql_error());
echo "успешно обновил";
}else{ 
echo "нет прав на изменение записи";
}
//htmlspecialchars()
mysql_close();

}else{
 $json_string =  json_decode($_POST["body_"]);
//echo  json_encode($json_string,JSON_UNESCAPED_UNICODE)  ;
echo phpversion();
$kill_him = array('"',"'","\n","\r");//ключи для замены в данных от клиента
$kill_then = array('&quot;',"&quot;","<br>","<br>");//ключи для замены в данных от клиента

$json_string->id  = str_replace( $kill_him,$kill_then,$json_string->id);
$json_string->names  = str_replace( $kill_him,$kill_then,$json_string->names);
$json_string->detail  = str_replace( $kill_him,$kill_then,$json_string->detail);
$json_string->times  = str_replace( $kill_him,$kill_then,$json_string->times);
$json_string->adress  = str_replace( $kill_him,$kill_then,$json_string->adress);
$json_string->myname = $user; 
$json_string->phone  = str_replace( $kill_him,$kill_then,$json_string->phone);
$json_string->site  = str_replace( $kill_him,$kill_then,$json_string->site);
$json_string->e_mail  = str_replace( $kill_him,$kill_then,$json_string->e_mail);
//$json_string->types  = str_replace( $kill_him,"&quot;",$json_string->types);
$json_string->hidden_flag  = str_replace( $kill_him,$kill_then,$json_string->hidden_flag);
$json_string->delite_flag  = str_replace( $kill_him,$kill_then,$json_string->delite_flag);
$json_string->region  = str_replace( $kill_him,$kill_then,$json_string->region);
$hidden_flag = $json_string->hidden_flag;
$json_string = json_encode($json_string,JSON_UNESCAPED_UNICODE);
//echo $json_string; 

$query = "INSERT INTO $userstable SET id_mark='".$_POST['id_']."',id_region='".$region_id."', user_name='".$user."',  json_body='".$json_string."', hidden_flag='".$hidden_flag ."'";
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
 mysql_query($query) or die( mysql_error());
/* Закрываем соединение */
mysql_close();
 
//echo "успешно создал";


}


 
?>