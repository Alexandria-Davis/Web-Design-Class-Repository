/*global $*/

$(document).ready(function(){
   $(".login").click(function () {
       $.ajax({
            type: "POST",
            url: "api/login.php",
            dataType: "json",
            data: {
                username: $("[name=username]").val(),
                password: $("[name=password]").val(),
            },
            success: function(data,status){
                
            },
            complete: function(data, status){
                window.location = "dashbord.php";
            }
        })
   }) ;
});
    