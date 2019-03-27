/* global $ */
$(document).ready( function() {

    

    
function get_categories() {
            $.ajax({
            type: "GET",
            url: "api/getCategories.php",
            dataType: "json",
            success: function(data,status){
                data.forEach(function(key) {
                    $("[name=category]").append(`<option value=${key["catID"]}>${key["catName"]}</option>`); //sorry, but I prefer magic strings to concatination
                });
            },
            complete: function(data, status){
                
            }
        })
}

function search_for_stuff() {
            $.ajax({
            type: "GET",
            url: "api/getSearchResults.php",
            dataType: "json",
            data: {
                "product":$("[name=product]").val(),
                "category":$("[name=category]").val(),
                "price_from":$("[name=priceFrom]").val(),
                "price_to":$("[name=priceTo]").val(),
                "order_by":$("[name=orderBy]:checked").val(),
            },
            success: function(data,status){
                $("#results").html("<h3>Products found:</h3>");
                console.log(data);
                $("#results_table").html("<tr><th></th><th>name</th><th>description</th><th>price</th></tr>");
                data.forEach(function(key) {
                    $("#results_table").append(
                        `<tr>
                            <td><a href="#" class="historylink" id="${key['productID']}"> History</a></td>
                            <td>${key['name']}</td>
                            <td>${key['description']}</td>
                            <td> ${key['price']}</td>
                        </tr>`
                        );
                })
            },
            complete: function(data, status){
            }
        })
    };


    get_categories();
    search_for_stuff()
    
    $("#searchForm").on("click", function() {
    search_for_stuff()
    })
})