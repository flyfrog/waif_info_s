function load_mark(pair){

if(waif.region_load.length<82 ){ // если уже не загружено
 

var data_ = 'region_='+waif.region; 
$.ajax({

  type: 'POST',
  url: 'sborka.php',
  data: data_,
  success: function(data) {
   // d("cons").innerHTML = data;
   // $('#load_place').html(data);
   d("cons").innerHTML = data;
   waif.region_load.push(pair); // указали что загурзили
if(data!="нет записей"){
d("cons").innerHTML = data;
 
var garbage_ar = data.split("$~*~$");
for(i=0;i<garbage_ar.length;i++){
 
var obj = JSON.parse(garbage_ar[i]);
add_mark(obj);
 //newPlacemark.options.set("draggable", true); 
 //map.geoObjects.add(newPlacemark); // отобразить на карте
}//end for
//build_list_mark();
}else{//записи нет
 // alert(data);
}
  }//sucess end
});

}//if load coontrol
}//end load_mark