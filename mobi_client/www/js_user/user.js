function create_map(){



waif.map_load = 1;
    ymaps.ready(function () {
        map = new ymaps.Map("YMapsID", {
            center: [55.76,37.64 ],
            zoom: 10
        }, {
        // При сложных перестроениях можно выставить автоматическое
        // обновление карты при изменении размеров контейнера.
        // При простых изменениях размера контейнера рекомендуется обновлять карту программно.
         autoFitToViewport: 'always'
    }
        );
       
 map.controls.remove('trafficControl'); //отключить пробки
 map.controls.remove('typeSelector'); //отключить пробки
 
 
map.events.add('actionend', function () { 
// при перетаскивании
 region_name();//обновить текущий активный регион
}); 
// определить текущий регион, и произвести первую загрузку


 

 
region_name();//обновить текущий активный регион
cheak_actual_base();
//load_mark();
 
    });//ymaps ready
 
}//сreate map -----------------------------------------------------------------------

function add_mark(m){
mark_position = 0; // если массив пуст заполнится верно, да уточка?
 
if(return_mark_at_name(m.id)!="undefined"){//проверим есть ли уже такая метка
    //если нет загрузим ее на карту
 
if(waif.mark.length!=-1){mark_position = waif.mark.length;} // установим место куда записать
waif.mark[mark_position] =  {}; // если нет инета  

  if(waif.inet==1){//только при наличии конекта
  newPlacemark  = new ymaps.Placemark(m.coord); 
  map.geoObjects.add(newPlacemark); // отобразить на карте
  waif.mark[mark_position] = newPlacemark; // добавление обекта метки в глоб массив
  }//if



    waif.mark[mark_position].id = m.id; 
    waif.mark[mark_position].myname = m.myname;  
    waif.mark[mark_position].coord = m.coord;
    waif.mark[mark_position].types = m.types; 
    waif.mark[mark_position].names = m.names;
    waif.mark[mark_position].detail = m.detail;
    waif.mark[mark_position].times = m.times;
    waif.mark[mark_position].phone = m.phone;
    waif.mark[mark_position].site = m.site;
    waif.mark[mark_position].e_mail = m.e_mail;
    waif.mark[mark_position].adress = m.adress;
    waif.mark[mark_position].hidden_flag = m.hidden_flag;
    waif.mark[mark_position].delite_flag = m.delite_flag;
    waif.mark[mark_position].p_duty = m.p_duty;
    waif.mark[mark_position].region = m.region;
 
 //console.log(return_region_pair( m.region));
 //console.log("--");



 if(waif.inet==1){//только при наличии конекта
 create_balloon(waif.mark[mark_position]);
 waif.mark[mark_position].options.set("iconLayout", 'default#image');
 waif.mark[mark_position].options.set("iconImageHref", waif.icons[m.types[0]]);
 waif.mark[mark_position].options.set("iconImageSize", [50,55]);
 waif.mark[mark_position].options.set("iconImageOffset", [-25,-55]); 
 }//if waif.inet


}//if id duplicate 
}//end add_mark

//.......................................................................
//.........................................................................
function region_name(){ // держит в waif.region название текущего региона
var coords =  map.getCenter();
coords[0] = coords[0].toFixed(3); 
coords[1] = coords[1].toFixed(3); 
 
if(waif.inet==1){ 
ymaps.geocode(coords).then(function (res) {
var names = [];
 
res.geoObjects.each(function (obj) {
names.push(obj.properties.get('name'));
});
 

for(i=0;i<waif.region_ar.length-1;i+=2){ // проверка по базе ответа геокодера
// это нужно потому что геокодер гавно порой возвращает
if(names[names.length-3]==waif.region_ar[i]||names[names.length-3]==waif.region_ar[i+1]){
  waif.region_pair = i;  // указываем пару из массива для проверки
  waif.region = names[names.length-3]; 
  change_in_select();
  break;
}//if
 
}//for
 
 

});
}//if inet

}//end region name


function return_region_pair(region_name){
for(i=0;i<waif.region_ar.length-1;i+=2){ // проверка по базе ответа геокодера
if(region_name==waif.region_ar[i]||region_name==waif.region_ar[i+1]){
  return i; // возвращием пару
}//if
}//for
}//region_pair


 function cheak_actual_base(){// проверим на актуальность базы

 var db = getLocalStorage();
 
if( db.getItem("base")!=null){
console.error("-----------");
var mark_mass = db.getItem("base").split("$~*~$");
console.error(mark_mass.length);
console.error("-----------");
load_mark(mark_mass.length);

}else{
console.error("Требуется база, локальное пусто!");  
load_mark(0);
}



 }//cheack actual end


//----------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
function load_mark(x){

 //http://localhost/morda/waif_info_s/sborka_end_all.php
 //http://p274368.for-test-only.ru/sborka_end_all.php
//http://waif.fly-f.ru/sborka_end_all.php
var data_ = 'number_='+x;//количество существующих меток
 

$.ajax({

  type: 'POST',
  url: 'http://karta.homeless.ru/sborka_end_all.php',
 data: data_,
  success: function(data) {
   // d("cons").innerHTML = data;
   // $('#load_place').html(data);
 
 console.log("******" + data); 

if(data!="not_old"){
 //alert(data); 
//console.log(data);  

burn_mark(data); // цикл с загрузкой
console.log(data); 
filter_on(-1); // отфильтрируем и новые метки
 
console.log("::::::::LOAD:::::::::");
save_base(data);
 
}else{//если база не требует обновления

console.log("::::::::NOT LOAD:::::::::");
offline_load();

} 

}//sucess end
});

 
}//end load_mark


function find(array, value) {for(var i=0; i<array.length; i++) {if (array[i] == value) return i;}return -1;}


function redisign_(){
if(waif.redisign_run==0){
waif.redisign_run=1;

waif.h_ = $(window).height();
waif.w_ = $(window).width(); 
 
 
d("left_menu").style.height =waif.h_ - waif.h_top_menu +"px"; 
 

d("region_list").style.width=waif.w_-10+"px";

d("YMapsID").style.height = (waif.h_ -waif.h_top_menu)+"px";
 
//**************************************
var btn_l = Math.floor(waif.w_/2)+5;
var btn_w = Math.floor(waif.w_/2)-15;
d("btn_2").style.left = btn_l + "px"; 
$(".btn").width(btn_w);

//***************************************
var space = 5;
var select_h = 50;
var white_space = waif.h_  - 50 ;
var h_block = white_space/12 - space*2;
var big_block = waif.w_ - (space*2);
var min_block =( waif.w_ - (space*3) )/2 ;

$(".cheak_box_form").height(h_block);
$(".cheak_box_form").css("line-height", h_block + "px"); 

d("f_1").style.top= select_h+ "px"; 
d("f_2").style.top= select_h+ "px";
d("f_3").style.top=h_block  + select_h + space+ "px";
d("f_4").style.top=h_block + select_h + space+ "px";

d("f_2").style.left= min_block+(space*2)+ "px"; 
d("f_4").style.left= min_block+(space*2)+ "px";

for(var t = 1;t<=4;t++){
$("#f_"+t).width(min_block);
} //for


for(var t = 5;t<=13;t++){
d("f_"+t).style.top =( (t-3)* (h_block+space)) +select_h+"px";
$("#f_"+t).width(big_block);
} //for

d("paid" ).style.top =( (14-3)* (h_block+space)) +select_h+"px";
$("#paid" ).width(big_block);
//***************************************************

d("list_box").style.height = (waif.h_ - waif.h_top_menu)+"px";


}//redisign run == 1
}//end redisign_map

function burn_mark(data){
   console.log("burn_ok");
var garbage_ar = data.split("$~*~$");
 
for(var i=0;i<garbage_ar.length;i++){
 
var obj = JSON.parse(garbage_ar[i]);
add_mark(obj);
 
 //newPlacemark.options.set("draggable", true); 
 //map.geoObjects.add(newPlacemark); // отобразить на карте
}//end for

}

function change_in_select(){
//console.error("ok");
$('#region_list').val(waif.region_pair);
}//end function 


function save_base(data){//сохранение базы данных
var db = getLocalStorage();
db.setItem("base",data);     
}//save_base

 
 
function getLocalStorage() {
    try {
        if(window.localStorage ) return window.localStorage;            
    }
    catch (e)
    {
        return undefined;
    }
}


 function offline_load(){

var db = getLocalStorage(); 
if( db.getItem("base")!=null){
burn_mark(db.getItem("base"));
}

redisign_(); 
change_in_select();
filter_on(-1);
 
 }//'offline_load'