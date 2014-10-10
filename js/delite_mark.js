function delite_mark(){
var mark  = waif.mark[return_mark()];
var data_ = 'id_='+mark.id;
 
$.ajax({
  type: 'POST',
  url: 'delite.php',
  data: data_,
  success: function(data){
  
map.geoObjects.remove(waif.mark[return_mark()]); // снимим марку с колекции карты
waif.mark.splice(return_mark(),1); // уберем удаленный элемент из глобального массива


map_size_normalize();
close_edit_form();
close_list_mark(); // закроем окно со списком меток на удаление
 waif.edit_form_flag=0;
 popup.open("<h3>"+ data + "</h3>", 'html' ); 
//alert(data); 
d("cons").innerHTML+="<br>"+data;

waif.free_mark = 0;
  }
});
}//delite_mark