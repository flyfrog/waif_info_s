<?php
session_start();
if(isset($_SESSION["is_auth"])==false){
   header('Location: http://localhost/morda/ad.php');
    exit;
}else{//все нормально ссесия запущена, осталась проверка
if($_SESSION["is_auth"]==false){
    header('Location: http://localhost/morda/ad.php');
    exit;
}else{  /*  выодим редактор*/ ?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <title>Примеры. Удаление карты с веб-страницы.</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="css/index.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="css/popup.css" media="all" rel="stylesheet" type="text/css"/> 
  
  <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"> </script>
  <script src="js/jquery.js" type="text/javascript"> </script>
  <script src="js/jquery-ui.min.js" type="text/javascript"> </script>
  <script src="js/load_mark.js" type="text/javascript"> </script>
  <script src="js/region_list.js" type="text/javascript"> </script>
  <script src="js/add_mark.js" type="text/javascript"> </script>
  <script src="js/create_mark.js" type="text/javascript"> </script>
  <script src="js/delite_mark.js" type="text/javascript"> </script>
  <script src="js/region_name.js" type="text/javascript"> </script>
  <script src="js/create_map.js" type="text/javascript"> </script>
  <script src="js/return_m.js" type="text/javascript"> </script>
  <script src="js/name_generator.js" type="text/javascript"> </script>
  <script src="js/load_all.js" type="text/javascript"> </script>
  <script src="js/jquery.popup.min.js" type="text/javascript"> </script>  
<style type="text/css">
body{
overflow: hidden;

}

.sh {
 
    font-size: 14px;
 
    color: #00AEFF;
 
}
</style>
</head>
<body>
<script type="text/javascript">
var popup = new $.Popup();
 



var d = function(x){return document.getElementById(x);}//для меня
 
var waif = new Object; // супер глобальный концентратор всего  
waif.myname =  ""; // имя текущуго пользвателя
waif.rule =  0; //права доступа текущего пользователя
waif.region = "Москва"; //активный регион, изменяется при drag карты
waif.mark = new Array(); // массив со всеми метками карты
//icons иконки для меток

waif.icons = new Array("img/food.png","img/shirt.png","img/sleep.png","img/gov.png","img/money.png","img/taxi.png","img/sanobrab.png","img/backhome.png","img/consult.png","img/doc.png","img/hiv.png","img/woman.png","img/inet.png","img/all.png");
waif.icons_bal = new Array("img/food_spec.png","img/shirt_spec.png","img/sleep_spec.png","img/gov_spec.png","img/money_spec.png","img/taxi_spec.png","img/sanobrab_spec.png","img/backhome_spec.png","img/consult_spec.png","img/doc_spec.png","img/hiv_spec.png","img/woman_spec.png","img/inet_spec.png","img/all_spec.png");
waif.titles = new Array("Питание","Выдача одежды","Жилье","Оброзование","Трудоустройство","Мобильная помощь", "Санитарная обработка","Возвращение домой","Консультация","Востановление документов","Помощь людям с ВИЧ", "Кризисный центр для женщин","Доступ в интернет","Комплексные услуги");
waif.complex_mark = new Array(5,13);

waif.region_load = new Array();// номера регионов уже загруженых меток
waif.region_ar = JSON.parse(region_list);  // массив с названиями регионов region_list.js
waif.free_mark = 0;//флаг разрешения - на создание метки, для условия в click на map
waif.edit_form_flag = 0;// контроль формы редактирования 1,0 открыта\закрыта
waif.virtual_icon_flag = 0; // 0 hidden, 1 vis
waif.load_stopper = 0;
var map; // объект карты яндекс

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

 

function start_create_mark(){ // по нажатию на кнопку, ставит флаги, и подсказки для создание 
// закрыть все другие окна
  if(waif.free_mark==0){
close_list_mark();
//close_clear_form();
 

    waif.free_mark = 1 ; // 1 - можно создать метку 
  }else{//добавить уведомление
    popup.open('<h3>закройте редактирование</h3>', 'html' );
   
  }
}//end start_create_mark



 
 
function fill_clear_form(){
 
var mark = waif.mark[return_mark()];// создадим простой экземпляр для обращения
var str = "";


//if(mark.types!=undefined){ str += mark.types;}
if(mark.names!=undefined){ str +="<p class='clear_form_lable'>Название</p>  " + mark.names;}
if(mark.detail!=undefined){ str +="<p class='clear_form_lable'>Описание</p> " + mark.detail;}
if(mark.adress!=undefined){ str +="<p class='clear_form_lable'>Адрес</p> " + mark.adress;}
if(mark.contact!=undefined){ str +="<p class='clear_form_lable'>Контакты</p> " + mark.contact;}

d("clear_content").innerHTML = str;
if(waif.myname==mark.myname||waif.myname=="admin")
{
  d("clear_form_edit_btn").style.visibility="visible";
}else{
  d("clear_form_edit_btn").style.visibility="hidden";
  }


d("clear_form").style.visibility="visible";

}//end fill_clear_form

 
//***********************************************************************************
function build_list_mark(){
  if(waif.edit_form_flag==0){
 
var str_list="";
var color  = "#ffffff"; 
 
for(y=0;y<waif.mark.length;y++){

if(waif.mark[y].myname==waif.myname){color="#a5c25c";}else{color="#fff";}
if(waif.mark[y].delite_flag==1){color="#de3458";}
str_list+="<div frog='r' id='"+waif.mark[y].id+"' onclick='mark_ceter_move(this.id)' class='block_mark_list' style='background-color:"+color+";'>Созданно:"+waif.mark[y].myname;
str_list+="<br>Тип: " + waif.titles[waif.mark[y].types[0]];
var status_str = "Активная";
if(waif.mark[y].hidden_flag==1){status_str="Скрытая";}
str_list+="<br>Статус: " + status_str;
str_list+="<br>Название: " + waif.mark[y].names;
str_list+="<br>Регион: " + waif.mark[y].region;
str_list+="</div>" ;

}//for
 

d("YMapsID").style.width = (waif.w_-400)+"px";
d("YMapsID").style.left =  400 +"px";
 
d("list_mark_place").innerHTML = str_list;
d("list_mark_place").style.visibility = "visible";

  }//if на запук
}//end build list mark


function close_list_mark(){
d("list_mark_place").style.visibility = "hidden";
if(waif.free_mark!=3){ // не минимизирует карту

map_size_normalize(); //вернуть карте размер окна
 }
}//end close_list_mark


function mark_ceter_move(x){

 map.setCenter(waif.mark[return_mark_at_name(x)].coord);
 map.setZoom(15);
 
}//end mark_ceter_move
//***********************************************************************************
 
 
//***********************************************************************************
function fill_edit_form(rule){
if(rule=="first"){ 
d("edit_form_close_btn").style.visibility="hidden";
 
 }else{ // при создании метки нельзя закрыть не сохраненную метку
d("edit_form_close_btn").style.visibility="visible";
 }//if
waif.edit_form_flag=1; 
waif.free_mark=3;
//close_clear_form();//закроем чистовую форму если с нее вызвано
close_list_mark(); 

//clear_edit_form();// очистим форму от старых значений    
close_bal(); // закроем балун
var mark = waif.mark[return_mark()];// создадим простой экземпляр для обращения

mark.options.set("draggable", true); // таскать метку
 

 


if(mark.names!=undefined){ d("element_1").value = mark.names;}
if(mark.detail!=undefined){ d("element_2").value = mark.detail.replace(/<br>/g, "\n");}
if(mark.adress!=undefined){ d("element_3").value = mark.adress.replace(/<br>/g, "\n");}
if(mark.types!=undefined){ d("element_5").value = mark.types[0];}
if(mark.times!=undefined){ d("element_6").value = mark.times.replace(/<br>/g, "\n");;}
if(mark.phone!=undefined){ d("element_4_1").value = mark.phone;}
if(mark.site!=undefined){ d("element_4_2").value = mark.site;}
if(mark.e_mail!=undefined){ d("element_4_3").value = mark.e_mail;}


if(typeof(mark.types)!="undefined"){
change_selection_form(mark.types[0]);
if(mark.types.length>1){
  for(var i=1;i<mark.types.length;i++){
  d("comp_cheak_"+mark.types[i]).checked = true;
  }//for
}//if
}//type of 


if(mark.p_duty!=undefined){ 
  if(mark.p_duty==1){d("p_flag_duty").checked = true;}else
  {d("p_flag_duty").checked = false;}
 
}//p_duty

d("status_mark").innerHTML = "Статус: активная";

if(mark.hidden_flag!=undefined){ 
  if(mark.hidden_flag==1)
    {d("hidden_flag").checked = true;
    d("status_mark").innerHTML = "Статус: скрытая";
    }
  else
    {d("hidden_flag").checked = false;}
}//if hidden_flag

if(mark.delite_flag!=undefined){
  if(mark.delite_flag==1){ 
    d("status_mark").innerHTML = "Статус: на удаление";
    d("recovery_btn").style.visibility = "visible";

  }
}//на удаление кнопка востановить

d("YMapsID").style.width = (waif.w_-400)+"px";
d("YMapsID").style.left =  400 +"px";
d("form_container").style.visibility = "visible";//откроем форму и покажем миру
}//end fill_edir_form
//***********************************************************************************
//options.visible - true false
//***********************************************************************************
function change_selection_form(x){//при вызове добавляет суб чек боксы ++++++++++++++++

var str="";
if(find(waif.complex_mark,x)!=-1){//комплексные услуги
 str+="<div class='sub_change_box'>";
 str+='<div><input type="checkbox" id="comp_cheak_0" class="cheak_box_form">питание</div>'; 
 str+='<div><input type="checkbox" id="comp_cheak_1" class="cheak_box_form">выдача одежды</div>'; 
 str+='<div><input type="checkbox" id="comp_cheak_2" class="cheak_box_form">жилье</div>'; 
 str+='<div><input type="checkbox" id="comp_cheak_3" class="cheak_box_form">образование</div>';
 str+='<div><input type="checkbox" id="comp_cheak_4" class="cheak_box_form">трудоустройство</div>';   
 str+='<div><input type="checkbox" id="comp_cheak_6" class="cheak_box_form">сан. обработка</div>';
 str+='<div><input type="checkbox" id="comp_cheak_7" class="cheak_box_form">возвращение домой</div>';
 str+='<div><input type="checkbox" id="comp_cheak_8" class="cheak_box_form">консультация</div>';
 str+='<div><input type="checkbox" id="comp_cheak_9" class="cheak_box_form">восстановление док-в</div>';
 str+='<div><input type="checkbox" id="comp_cheak_10" class="cheak_box_form">помощь людям с ВИЧ</div>';
 str+='<div><input type="checkbox" id="comp_cheak_11" class="cheak_box_form">кризисный центр для женщин</div>';
 str+='<div><input type="checkbox" id="comp_cheak_12" class="cheak_box_form">доступ к интернету</div>'; 
 
 str+="</div>";
}

d("sub_selected").innerHTML = str;
}//end change ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 
function find(array, value) {for(var i=0; i<array.length; i++) {if (array[i] == value&&array.length!=-1) return i;}return -1;}
//find поиск по массиву 



var ee=0;
function create_balloon(el){
 
 var str = "";
  str+="<img src='"+ waif.icons_bal[el.types[0]] + "' /><br>";
 str+="<span class='logo_bal'>"+ waif.titles[el.types[0]] + "</span> ";
 //if(ee==0){ee=1; alert(waif.icons[el.types]);}

if(el.names!="?"){str+="<br><span class='name_bal'>"+ el.names + "</span>";}
if(el.detail!="?"){str+="<br><span class='detail_bal'>"+ el.detail + "</span>";}
if(el.times!="?"){str+="<br><span class='sub_label_bal'>Время работы: </span>"+ el.times;} 
if(el.phone!="?"){str+="<br><span class='sub_label_bal'>Телефон: </span>"+ el.phone;}
if(el.site!="?"){str+="<br><span class='sub_label_bal'>Сайт: </span>"+ el.site;}
if(el.e_mail!="?"){str+="<br><span class='sub_label_bal'>Эл. почта: </span>"+ el.e_mail;}
if(el.adress!="?"){str+="<br><span class='sub_label_bal'>Адрес: </span>"+ el.adress;}


//str+='<br><input type="button" value="закрыть" onclick="close_bal()"  />';
if(waif.myname==el.myname||waif.myname=="admin"){
str+='<br><input  type="button" value="редактировать" onclick="fill_edit_form()"  class="btn_bal"/>';
 } 


el.properties.set('balloonContent', str);
}//end create_balloon

function save_form(){ // передать все значения сюда при прохождении

if(form_chek()==1){
waif.free_mark=0;
waif.edit_form_flag=0;
var mark = waif.mark[return_mark()];

mark.options.set("draggable", false);//не таскать
 
 
mark.names = d("element_1").value;
mark.detail = d("element_2").value;
mark.adress = d("element_3").value;
mark.times = d("element_6").value;
mark.region = waif.region;

mark.phone = d("element_4_1").value;
mark.site = d("element_4_2").value;
mark.e_mail = d("element_4_3").value;
 
 
mark.types = new Array();

mark.types[0] = d("element_5").value;

for(var i=0; i<20;i++){// если число пункторв дудет увеличиватся > 20 поднять планку
if(document.getElementById("comp_cheak_"+i)!=null){
  if(d("comp_cheak_"+i).checked==true){
mark.types.push(i);
  }

}
}//for
 
 
if(d("hidden_flag").checked==true) {mark.hidden_flag=1;}else{mark.hidden_flag=0;} 
if(d("p_flag_duty").checked==true) {mark.p_duty=1;}else{mark.p_duty=0;} 
 
mark.options.set("iconLayout", 'default#image');
mark.options.set("iconImageHref", waif.icons[mark.types[0]]);
mark.options.set("iconImageSize", [50,55]);
mark.options.set("iconImageOffset", [-25,-55]);


create_balloon(mark);
close_edit_form();

save_in_server(mark); 
}else{
 popup.open('<h3>нужно заполнить все поля</h3>', 'html' );
//  alert("заполните");
}

}//end save_form

 
function save_in_server(mark){//отправка ajax 
 
var data_ = 'id_='+mark.id+"&";
data_ += 'region_='+mark.region+"&"; 
data_ += 'body_='+build_json_body(mark);
$.ajax({
  type: 'POST',
  url: 'ajax.php',
  data: data_,
  success: function(data){
  $('#cons').html(data);
 
  }
});

}//end sava_in_server


function build_json_body(mark){
var json_mark = new Object;
json_mark.id = mark.id;
json_mark.types =  mark.types;
 
json_mark.names = mark.names;  
json_mark.region = mark.region;  
json_mark.phone = mark.phone;  
json_mark.site = mark.site;  
json_mark.e_mail = mark.e_mail;  
json_mark.coord = mark.coord;  
json_mark.times = mark.times;  
json_mark.myname = json_mark.detail = mark.detail;  
json_mark.adress = mark.adress;  
json_mark.hidden_flag = mark.hidden_flag;
json_mark.delite = mark.delite_flag;
mark.myname;
// -----------------
json_mark.p_duty = mark.p_duty; // платно или бесплатно

 
// json_mark.propirties = mark.propirties;
return JSON.stringify(json_mark);

}

//***********************************************************************************
//***********************************************************************************

function recovery_mark(){
var mark  = waif.mark[return_mark()];
var data_ = 'id_='+mark.id;
close_edit_form();

$.ajax({
  type: 'POST',
  url: 'recovery.php',
  data: data_,
  success: function(data){
 popup.open("<h3>" + data + "</h3>", 'html' );
 // alert(data);

if(data=="успешно"){
  mark.delite_flag = 0 ; 
  mark.myname = waif.myname ;
 // d("status_mark").innerHTML = "Востановленная";
 // d("cons").innerHTML+="<br>"+data;
 popup.open("<h3>" + data + "</h3>", 'html' ); 
}//if успешно
 else{//проблемы
 popup.open( "<h3>" + data + "</h3>", 'html' ); }
  }
});


}//end recovery mark


function close_edit_form(){

//проверка на поля 
d("element_6").value = ""; 
d("element_5").value = "";
d("element_4_1").value = "";
d("element_4_2").value = "";
d("element_4_3").value = "";
d("element_3").value = "";
d("element_2").value = "";
d("element_1").value = "";
d("sub_selected").innerHTML = "";
//скроем саму форму

d("edit_form_close_btn").style.visibility = "hidden";
d("recovery_btn").style.visibility = "hidden";
waif.edit_form_flag=0;
waif.free_mark=0;
 map_size_normalize(); //вернуть карте размер окна

 if(typeof(return_mark())!="undefined"){ 
waif.mark[return_mark()].options.set("draggable", false);
 }//отменить перетаскивание метки

d("form_container").style.visibility = "hidden";
}//end colse_edit_form

function form_chek(){
// возврощает 1 если все заполнено или 0
//добавить подсветку полей не заполненых
var chek_out = 1;
if(d("element_1").value==""){chek_out = "element_1";}
if(d("element_2").value==""){chek_out = "element_2";}
if(d("element_3").value==""){chek_out = "element_3";}
if(d("element_5").value==""){chek_out = "element_5";}
if(d("element_4_1").value==""){chek_out = "element_4_1";}
if(d("element_4_2").value==""){chek_out = "element_4_2";}
if(d("element_4_3").value==""){chek_out = "element_4_3";}

return chek_out;
}//form_chek

function close_clear_form(){


d("clear_form").style.visibility = "hidden";
d("clear_form_edit_btn").style.visibility = "hidden";

}//end colse_edit_form



function map_size_normalize(){

 d("YMapsID").style.width = (waif.w_ )+"px";
 d("YMapsID").style.left =  0 +"px";

}

function clear_edit_form(){
d("element_5").value="";
d("element_1").value="";
d("element_2").value="";
d("element_3").value="";
d("element_4_1").value="";
d("element_4_2").value="";
d("element_4_3").value="";
}


function close_bal(){
var r = waif.mark[return_mark()];
r.balloon.close();
}
 
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

$(document).ready(function () {
waif.h_ = $(window).height();
waif.w_ = $(window).width(); 

d("list_mark_place").style.height = waif.h_-40+"px";
d("form_container").style.height = waif.h_-40+"px";
d("clear_form").style.height = waif.h_-40+"px";
 
create_map();

 waif.rule = parseInt(d("rule").value); // права доступа
 waif.myname =  d("login").value; // имя пользователя
 

$(document).mousemove(function(e){
waif.x =  e.pageX ;
waif.y =  e.pageY ; 

if(waif.free_mark==1){
  if(waif.virtual_icon_flag==0){d("virtual_icon").style.visibility="visible"; waif.virtual_icon_flag=1;}
  d("virtual_icon").style.left = e.pageX-25 + "px";
  d("virtual_icon").style.top = e.pageY-57 + "px";
}else{
if(waif.virtual_icon_flag==1){d("virtual_icon").style.visibility="hidden"; waif.virtual_icon_flag=0;}

}//if
});
 //document.getElementById("region_list").onchange = function (){
// region_select(d("region_list").options[this.selectedIndex].text);
//}

});

 
// fly-frog-fly@yandex.ru
</script>

<div id="black_hole" class="black_hole"></div>
<div id="top_block" class="top_block_css">
<a href="ad.php?is_exit=1"><input type="button" value="выход"     class="exit"/></a>
<input type="button" value="создать метку" onclick="start_create_mark()" class="btn_create_mark"/>
<input type="button" value="список" onclick="build_list_mark()" class="btn_help"/>
<input type="button" value="загрузить все" onclick="load_all()" class="btn_help"/>
<input type="button" value="справка" onclick=" " class="btn_help"/>
 
</div>

<div id="YMapsID"  class="map"  style="width: 100%; height: 100%;"></div>
<img id="virtual_icon" src="img/virt.png" class="virtual_img" />




<div id="cons" class="srq"></div>

<div id="list_mark_place" class="list_mark">
 
<div id="list_mark_place_load"></div>
</div>


<div id="form_container"  >
<form id="form_886925"   method="post" action="">               
<ul class="edit_form_ui">
<li>
  <label  id="status_mark" class="form_status"  >Статус метки:</label> 
</li>


<li>      
  <input type="checkbox"  id="hidden_flag" class="cheak_box_form"> cкрыть 
</li>
        
<li class="sub_label_form">
<label >Выберети тип метки </label><br>
<select   id="element_5" onchange="change_selection_form(this.value)" >      
<option value="0" >питание</option>
<option value="1" >выдача одежды</option>
<option value="2" >жилье</option>
<option value="3" >образование</option>
<option value="4" >трудоустройство</option>
<option value="5" >мобильная помощь</option>
<option value="6" >санитарная обраб.</option>
<option value="7" >возвращение домой</option>
<option value="8" >консультации</option>
<option value="9" >востоновление док.</option>
<option value="10" >помощь людям с ВИЧ</option>
<option value="11" >кризисный центр для жен.</option>
<option value="12" >доступ к интернету</option>
<option value="13" >комплексные услуги</option>
</select>
<div id="sub_selected"></div>
</li>      
        
  <li class="sub_label_form">
  <label >Название места</label><br>
  <input id="element_1" placeholder="если нет впишите ?"    type="text" class="text_input_form"   value=""/> 
  </li>  

  <li class="sub_label_form">
  <label >Детальная информация</label><br>
  <textarea id="element_2" class="text_area_form" placeholder="описание места, какие услуги предоставляются, кто может обратится, требования - если есть"  ></textarea> 
  </li>  

   <li class="sub_label_form">
  <label >Время работы</label><br>
  <textarea id="element_6" class="text_area_form"  ></textarea> 
  </li>   

  <li class="sub_label_form">
  <label>Адрес</label><br>
  <textarea id="element_3" class="text_area_form" placeholder="точный адрес места, и если необходимо, укажите как добратся до него" ></textarea> 
  </li>

  <li class="sub_label_form">
  <label >Телефон</label><br>
  <input id="element_4_1" placeholder="если нет впишите ?" type="text" class="text_input_form_contact"  value=""/>
  <br>
  <label >Сайт</label><br>
  <input id="element_4_2" placeholder="если нет впишите ?" type="text" class="text_input_form_contact" value=""/>
  <br>
  <label >Электронная почта </label><br>
  <input id="element_4_3" placeholder="если нет впишите ?" type="text" class="text_input_form_contact"   value=""/>  
  </li>
          

  <li>
  <input type="checkbox"  id="p_flag_duty" class="cheak_box_form">платное/бесплатное
  </li>
 
  <li>
  <input type="hidden" name="form_id" value="" />
  <input id="saveForm" class="btn_edit_form" type="button"   name="submit" value="Сохранить" onclick="save_form()" />
  <input type="button" value="Удалить" onclick="delite_mark()"  class="btn_edit_form"/>
  <input id="edit_form_close_btn" type="button" value="Закрыть" onclick="close_edit_form()"  class="btn_edit_form"/> <br>
  <input id="recovery_btn" type="button" value="Востановить" onclick="recovery_mark()"  class="btn_edit_form" style="visibility: hidden; "/>
  </li>
  
</ul>
</form> 
</div> 


<div id="clear_form" class="clear_form">
<div id="clear_content"></div>
<input type="button" value="закрыть" onclick="close_clear_form()"  class="btns"/>
<input id="clear_form_edit_btn" type="button" value="редактировать" onclick="fill_edit_form()"  class="btns"/>
</div>   

 
<div id="load_place" style="visibility:hidden;"> </div>
<?php

echo "<input id='rule' type='hidden' value='".$_SESSION["rule"]."' />";
echo "<input id='login' type='hidden' value='".$_SESSION["login"]."' />";

?>
</body>
</html>
<?php
}//if на проверку сесси
}
?>