/*
var inputs = document.querySelectorAll("input");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", build);
}
*/
/*global $*/
var ZipCode = document.querySelector("#ZipField").addEventListener("change", findzip);


function findzip() {
    var ZipCode = document.querySelector("#ZipField");
    console.log(ZipCode.value);
    $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
        dataType: "json",
        data: {
            zip: ZipCode.value
        },
        success: function(data, status) {
            console.log(`data: ${data}`)
            var city = "";
            var longitude = "";
            var latitude = "";
            var zipError = "Error: Zipcode not found";
            if (data) {
                city = data["city"];
                longitude = data["longitude"];
                latitude = data["latitude"];
                zipError = ""
            }
            document.querySelector("#CityField").setAttribute("value", city);
            document.querySelector("#LatField").setAttribute("value", latitude);
            document.querySelector("#LongField").setAttribute("value", longitude);
            document.querySelector("#ZipError").innerHTML = zipError;
        },
        complete: function(data, status) { //optional, used for debugging purposes
            console.log(`status: ${status}`);
        }
    })

}
