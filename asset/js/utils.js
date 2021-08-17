function createRequest(){
    try {
        request = new XMLHttpRequest();
    } catch (ms) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (otherMs) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }

        }
       
    }
    return request;
}


function addEventHandler(obj, eventName, handler){
    if(document.attachEvent){
        obj.attachEvent("on" + eventName, handler);
    } else if(document.addEventListener){
        obj.addEventListener(eventName, handler, false);
    }
}


function getActivatedObject(e){
    var obj;

    if(!e){
        obj = window.Event.srcElement;
    } else if(e.srcElement) {
        obj = e.srcElement;
    } else {
        obj = e.target;
    }

    return obj;
}