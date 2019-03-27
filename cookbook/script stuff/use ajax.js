/* global $ */
$(document).ready(
    function(){
        $.ajax({
            type: "GET",
            url: "api/getCategories.php",
            dataType: "json",
            data: {
            
            },
            success: function(data,status){
                
            },
            complete: function(data, status){
                
            }
        })
    }
    )