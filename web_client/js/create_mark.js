function create_mark(e){
var coords = e.get('coords');
 
mark_position = 0; // если массив пуст заполнится верно, да уточка?
if(waif.mark.length!=-1){mark_position = waif.mark.length;} // установим место куда записать
 

 newPlacemark  = new ymaps.Placemark(coords); 
 newPlacemark.options.set("draggable", true); 
 
 newPlacemark.options.set("iconLayout", 'default#image');
 newPlacemark.options.set("iconImageHref","img/virt.png");
 newPlacemark.options.set("iconImageSize", [50,56]);
 newPlacemark.options.set("iconImageOffset", [-25,-56]);

    map.geoObjects.add(newPlacemark); // отобразить на карте
    waif.mark[mark_position] = newPlacemark; // добавление обекта метки в глоб массив
    waif.mark[mark_position].id = name_generator(); 
    waif.mark[mark_position].myname = waif.myname;  
    waif.mark[mark_position].coord = coords;
    waif.mark[mark_position].delite_flag = 0;
    waif.mark[mark_position].region = waif.region;
    waif.now = waif.mark[mark_position].id; 




waif.mark[mark_position].events.add('click', function (e) {//---CLICK-----
waif.now =   e.get("target").id; // в кэш какую метку редактируем
//fill_clear_form();

});//событие -------------------------------------------------------------------

waif.mark[mark_position].events.add('dragend', function (e) {//----DRAG----
//alert(e.get("coordinates"));
 
 var new_coords = e.get('target').geometry.getCoordinates();
 
 e.get("target").coord = new_coords;
 d("cons").innerHTML=new_coords;
 
});//событие -------------------------------------------------------------------
 
 
fill_edit_form("first");

}//end create_mark