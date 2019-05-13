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
                
            },
            complete: function(data, status){
                for (var i = 0; i < data["results"].length; i++)
                {
                    window.location("dashboard.php")
                }
                
            }
        })
    })
})