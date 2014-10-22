
function add_mark(m){


mark_position = 0; // если массив пуст заполнится верно, да уточка?
 
if(return_mark_at_name(m.id)==-1){//проверим есть ли уже такая метка
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


create_balloon(waif.mark[mark_position]);
 

waif.mark[mark_position].options.set("iconLayout", 'default#image');

 
waif.mark[mark_position].options.set("iconImageHref", waif.icons[m.types[0]]);
 
waif.mark[mark_position].options.set("iconImageSize", [50,55]);
waif.mark[mark_position].options.set("iconImageOffset", [-25,-55]); 

waif.mark[mark_position].events.add('click', function (e) {//---CLICK-----
// var coords = e.get('coords');
 
 //e.get("target").options.set('visible', false);
 
if(waif.free_mark==0){
    waif.now =   e.get("target").id; // в кэш какую метку редактируем

    // map.setCenter((e.get("target").coord));
    // map.setZoom(15);
   // fill_clear_form();
 
     }//free mark if
    });//событие -------------------------------------------------------------------

waif.mark[mark_position].events.add('dragend', function (e) {//----DRAG----
//alert(e.get("coordinates"));
 
 var new_coords = e.get('target').geometry.getCoordinates();
 
 e.get("target").coord = new_coords;
 d("cons").innerHTML=new_coords;
 
});//событие -------------------------------------------------------------------


}//if id duplicate 
}//end add_mark