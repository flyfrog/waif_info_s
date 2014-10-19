function create_map(){    ymaps.ready(function () {
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
region_name();
redisign_();
    });//ymaps ready

}//сreate map -----------------------------------------------------------------------

function add_mark(m){
mark_position = 0; // если массив пуст заполнится верно, да уточка?
 
if(return_mark_at_name(m.id)!="undefined"){//проверим есть ли уже такая метка
    //если нет загрузим ее на карту
 
if(waif.mark.length!=-1){mark_position = waif.mark.length;} // установим место куда записать

 newPlacemark  = new ymaps.Placemark(m.coord); 
 
    map.geoObjects.add(newPlacemark); // отобразить на карте
    waif.mark[mark_position] = newPlacemark; // добавление обекта метки в глоб массив
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
 
 console.log( m.region);
 console.log("--");

create_balloon(waif.mark[mark_position]);
 
 
 waif.mark[mark_position].options.set("iconLayout", 'default#image');

 
  waif.mark[mark_position].options.set("iconImageHref", waif.icons[m.types[0]]);
 
 
waif.mark[mark_position].options.set("iconImageSize", [50,55]);
waif.mark[mark_position].options.set("iconImageOffset", [-25,-55]); 
 
}//if id duplicate 
}//end add_mark

//.......................................................................
//.........................................................................
function region_name(){ // держит в waif.region название текущего региона
var coords =  map.getCenter();
coords[0] = coords[0].toFixed(3); 
coords[1] = coords[1].toFixed(3); 
 
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
 
load_control(); // прежде чем загружать надо проверить не загружино ли уже

});
}//end region name


function return_region_pair(region_name){
for(i=0;i<waif.region_ar.length-1;i+=2){ // проверка по базе ответа геокодера
if(region_name==waif.region_ar[i]||region_name==waif.region_ar[i+1]){
  return i; // возвращием пару
}//if
}//for
}//region_pair


function load_control(){
var local_load_pair  = waif.region_pair;




if(waif.region_load.length!=0){//что то лежит в кубышки
var new_region = 0;
  for(i=0;i<waif.region_load.length;i++){

    if(waif.region_load[i]==local_load_pair){//<
      // загрузить новый сет 
      new_region=1;//есть такой регион   

      filter_on(-1);//отсортируем уже есть регионы    
      break;
    }//if <

  }//for
if(new_region==0){

load_mark(local_load_pair);   } // загрузить если нет 
} else{//массив пустой будем первыми

load_mark(local_load_pair);
}

}//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
function load_mark(pair){

if(waif.region_load.length<82 ){ // если уже не загружено

  alert(pair);
var data_ = 'region_='+waif.region; 
$.ajax({

  type: 'POST',
  url: 'sborka_end.php',
  data: data_,
  success: function(data) {
   // d("cons").innerHTML = data;
   // $('#load_place').html(data);
 
   waif.region_load.push(pair); // указали что загурзили

if(data!="нет записей"){
 //alert(data); 
  console.log("******************");

var garbage_ar = data.split("$~*~$");
 
for(var i=0;i<garbage_ar.length;i++){
 
var obj = JSON.parse(garbage_ar[i]);
add_mark(obj);
 
 //newPlacemark.options.set("draggable", true); 
 //map.geoObjects.add(newPlacemark); // отобразить на карте
}//end for
filter_on(-1); // отфильтрируем и новые метки
if(waif.list_box_view_flag==1){filter_on(-1);}//если открыты карточки отрисовать их

 
}else{//записи нет

if(waif.list_box_view_flag==1){filter_on(-1); }//если открыты карточки отрисовать их  
 //alert(data);
 // popup.open('<h3>Нет данных по региону</h3>', 'html' );
}
  }//sucess end
});

}//if load coontrol
}//end load_mark


function find(array, value) {for(var i=0; i<array.length; i++) {if (array[i] == value) return i;}return -1;}

function redisign_(){
 d("view_mark_list").style.width = (waif.w_ -300)+"px";
 d("view_mark_list").style.left =  300 +"px";


 d("YMapsID").style.width = (waif.w_ -300)+"px";
 d("YMapsID").style.left =  300 +"px";

}//end redisign_map



function change_in_select(){
console.error("ok");


$('#region_list').val(waif.region_pair);



}//end function 