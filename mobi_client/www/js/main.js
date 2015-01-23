/*jslint browser:true, devel:true, white:true, vars:true, eqeq:true */
/*global intel:false*/
/*
 * This function runs once the page is loaded, but the JavaScript bridge library is not yet active.
 */
var init = function () {

  setTimeout(main,50);
 navigator.splashscreen.hide(); 
};
 
window.addEventListener("load", init, false);  

 //  Prevent Default Scrolling  
var preventDefaultScroll = function(event) 
{
    // Prevent scrolling on this element
    event.preventDefault();
    window.scroll(0,0);
    return false;
};
    
window.document.addEventListener("touchmove", preventDefaultScroll, false);
/*
 * Device Ready Code 
 * This event handler is fired once the JavaScript bridge library is ready
 */
var onDeviceReady=function(){                             // called when Cordova is ready
   if( window.Cordova && navigator.splashscreen ) {     // Cordova API detected
                        // hide splash screen
        

    }
   



waif.previousConnectionState = "";
document.addEventListener("intel.xdk.device.connection.update",function(e){
        if (waif.previousConnectionState != intel.xdk.device.connection)
        {
                waif.previousConnectionState = intel.xdk.device.connection;
                debug(intel.xdk.device.connection);
                if(waif.previousConnectionState=="none"){waif.inet=0;}else{
                    waif.inet=1;
                    if(waif.map_load==0){clear_app();}

                }
        }
        setTimeout("intel.xdk.device.updateConnection();",2000);  //after we get an update on the connection, check again 2 seconds later
},false);
 
 
};
document.addEventListener("deviceready", onDeviceReady, false) ;


      
//Beep button functionality



 


 
