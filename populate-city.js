
$(document).ready(function(){
    $.getJSON("cities.json", function(data){
        var dropdown = document.getElementById("locality-dropdown");
        var opt = document.createElement("option");
        var index = 0;
        opt.value= index;
        opt.innerHTML = 'Select a city'; 

        // then append it to the select element
        dropdown.appendChild(opt);

        for (var i = 0; i < data['city'].length; i++){
            var opt = document.createElement("option");
            opt.value= data['city'][i].name.toUpperCase();
            opt.innerHTML = data['city'][i].name.toUpperCase(); // whatever property it has
            dropdown.appendChild(opt);
        }



    }).fail(function(){
        console.log("An error has occurred.");
    });
});