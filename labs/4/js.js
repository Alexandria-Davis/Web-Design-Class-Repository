/*
var inputs = document.querySelectorAll("input");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", build);
}
*/
/*global $*/
document.querySelector("#ZipField").addEventListener("change", findzip);
document.querySelector("#UNameField").addEventListener("change", checkUname)
document.querySelector("#PField").addEventListener("change",checkPass)
document.querySelector("#PField2").addEventListener("change",checkPass)
function checkUname() {
    var uname = document.querySelector('#UNameField').value;
    var taken = [ 'Username','username','Admin','admin','alexandria','mine','owner'];
    if ($.inArray(uname,taken) == 1)
    {
        document.querySelector("#UNameError").innerHTML = "This username is taken";
    }
    else
    {
        document.querySelector("#UNameError").innerHTML = "";
    }
}
function checkPass() {
    var pass = document.querySelector("#PField").value;
    var pass2 = document.querySelector("#PField2").value;
    var passError = document.createElement("ul");
    document.querySelector("#PassError").appendChild(passError);
    if (pass != pass2)
    {
        var error = document.createElement("li");
        error.innerHTML = "Passwords don't match";
        passError.appendChild(error);
    }
    if (pass.length < 20)
    {
        error = document.createElement("li");
        error.innerHTML = "Password is too short";
        passError.appendChild(error);
    }
    if (pass.includes(document.querySelector("#UNameField").value))
    {
        error = document.createElement("li");
        error.innerHTML = "Password contains username";
        passError.appendChild(error);
    }
}


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
            var city = "";
            var longitude = "";
            var latitude = "";
            var state = "";
            var zipError = "Error: Zipcode not found";
            if (data) {
                city = data["city"];
                longitude = data["longitude"];
                latitude = data["latitude"];
                state = data["state"]
                zipError = ""
            }
            document.querySelector("#CityField").setAttribute("value", city);
            document.querySelector("#LatField").setAttribute("value", latitude);
            document.querySelector("#LongField").setAttribute("value", longitude);
            document.querySelector("#StateField").setAttribute("value", state);
            document.querySelector("#ZipError").innerHTML = zipError;
                findCounty(state);
        },
        complete: function(data, status) { //optional, used for debugging purposes
            console.log(`status: ${status}`);
        }
    });
}
function findCounty(state)
{
        $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php?state=ca",
        dataType: "json",
        data: {
            state:state
        },
        success: function(data, status) {
            console.log((data[1])["county"])
            var drop = document.querySelector("#CountyDrop");
            drop.innerHTML = ""; //a dirty way of cleaning up
            for (var i = 0; i < data.length; i++)
            {
                var option = document.createElement("option");
                option.innerHTML = data[i]["county"];
                option.setAttribute("id",`County_${(data[i])["county"]}`);
                drop.appendChild(option);
            }
            
            //document.querySelector("#CountyDrop").setAttribute("value", county);
        },
        complete: function(data, status) { //optional, used for debugging purposes
            console.log(`status: ${status}`);
        }
    });
}