$(document).ready(
    function(){
        $.ajax({
            type: "GET",
            url: "api/getHistory.php",
            dataType: "json",
            data: {
            
            },
            success: function(data,status){
                
            },
            complete: function(data, status){
                
            }
        })
    }
    function loadup(data)
    {
        for (var i = 0; i < data.length; i++)
            $("#target").append(`<tr><td><img src=${data[i]['img_url']}</td><td>${}</td></tr>`)
    }
    
    
)