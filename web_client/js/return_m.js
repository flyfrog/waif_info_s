
function return_mark(){

    for(var i=0;i<waif.mark.length;i++){
        if(waif.now == waif.mark[i].id){
           return i;
        }
    }//for

}//function return_mark

function return_mark_at_name(x){
 
    for(var i=0;i<waif.mark.length;i++){
        if(x == waif.mark[i].id){
           return i;
        }
    }//for
 return -1;
}//function return_mark


function return_mark_at_name_spec(x,ar){
 if(ar.length>0){
    for(var i=0;i<ar.length;i++){
        if(x == ar[i].id){
           return i;
        }
    }//for
}//if length > 0 
 return -1;
}//function return_mark
