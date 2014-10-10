
function load_all(){

// поставить блокиратор 
if(waif.region_load.length<82&&waif.load_stopper==0){ // если уже не загружено
load_stopper = 1;
 // 82 число пар регон-город
d("black_hole").style.visibility = "visible";

$.ajax({

  type: 'POST',
  url: 'sborka_all.php',
 
success: function(data) {
 
waif.region_load = new Array(); // обнулим 
for(var i=0;i<164;i+=2){ // и заполним всеми загружеными регионами
waif.region_load.push(i); // указали что загурзили
}//for

if(data!="нет записей"){

var garbage_ar = data.split("$~*~$");
 
for(i=0;i<garbage_ar.length;i++){
var obj = JSON.parse(garbage_ar[i]);
add_mark(obj);
}//end for 
} 
//успешно загружено
//блокиротор отменить

d("black_hole").style.visibility = "hidden";
popup.open('<h3>Загружены все марки</h3>', 'html' );

}//sucess end
});

 

 }//if на загрузку
 else{
popup.open('<h3>Все метки уже загружены</h3>', 'html' );
 }
}//load all
