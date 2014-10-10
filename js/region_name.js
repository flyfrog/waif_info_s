function region_name(){ // держит в waif.region название текущего региона
var coords =  map.getCenter();
coords[0] = coords[0].toFixed(3); 
coords[1] = coords[1].toFixed(3); 
 
ymaps.geocode(coords).then(function (res) {
var names = [];
 
res.geoObjects.each(function (obj) {
names.push(obj.properties.get('name'));
});
 

for(var i=0;i<waif.region_ar.length-1;i+=2){ // проверка по базе ответа геокодера

if(names[names.length-3]==waif.region_ar[i]||names[names.length-3]==waif.region_ar[i+1]){
	waif.region_pair = i;  // указываем пару из массива для проверки
	waif.region = names[names.length-3]; 
	break;
}//if
 
}//for
 
load_control(0); // прежде чем загружать надо проверить не загружино ли уже

 d("cons").innerHTML = waif.region; // отладочная
 
});
}//end region name

function load_control(pair){
var local_load_pair  = waif.region_pair;
 
if(pair!=0){local_load_pair = pair; } 
 

if(waif.region_load.length!=0){//что то лежит в кубышки
var new_region = 0;
	for(i=0;i<waif.region_load.length;i++){

		if(waif.region_load[i]==local_load_pair){//<
			// загрузить новый сет 
			new_region=1;//есть такой регион			 
			break;
		}//if <

	}//for
if(new_region==0){load_mark(local_load_pair);  } // загрузить если нет 
} else{//массив пустой будем первыми
 
load_mark(local_load_pair);
}

}