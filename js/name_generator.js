function name_generator(){
var name_ = "";
name_ +=  parseInt(Math.random() * (9999999 - 1) + 1) +"_";
name_ +=  parseInt(Math.random() * (9999999 - 1) + 1); // на всякий случай
    return name_;
}
//    e.preventDefault(); // При двойном щелчке зума не будет.

  $(function() {
   // $( "#cons" ).draggable();
   // $( "#form_container" ).draggable();
    //$( "#clear_form" ).draggable();
    //$( "#list_mark_place" ).draggable();
  });