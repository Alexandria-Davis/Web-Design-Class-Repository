/*global $*/

$(document).ready(function(){
   $(".signup").click(function () {
       $.ajax({
            type: "POST",
            url: "api/signup.php",
            dataType: "json",
            data: {
                username: $("[name=username]").val(),
                password: $("[name=password]").val(),
            },
            success: function(data,status){
                
            },
            complete: function(data, status){
                window.location = "login.php"
            }
        })
   }) ;
});
    