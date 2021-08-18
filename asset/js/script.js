
window.onload = initpage;


function initpage(){
    
    var form = document.querySelector("form");

    form.addEventListener("submit", function(e){
    
        if(document.querySelector("input[type='text']").value == ""){
            e.preventDefault();
        }
    });

}






