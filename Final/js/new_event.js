/* global $ */
$(document).ready(function() {
    $(".submit").click(function() {
        $.ajax({
            type: "GET",
            url: "api/add_event.php",
            dataType: "json",
            data: {
                start: $("[name=start]").val(),
                end: $("[name=end]").val(),
                date: $("[name=date]").val(),
                details:$("[name=details]").val(),
            },
            success: function(data,status){
                window.location = "dashboard.php"
            },
            complete: function(data, status){
                
                
            }
        })
    })
})