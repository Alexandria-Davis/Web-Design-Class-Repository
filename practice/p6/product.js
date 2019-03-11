
/*global $*/
var updatePrice = function()
{
    var price =  $(".unit_price").html();
    var quantity = $(".quantity").html();
    
    $(".utotal").html(  price*quantity  );
    $(".dtotal").html($(".discount").html() * ($(".utotal").html()/100.0) );
    $(".subtotal").html($(".utotal").html() - $(".dtotal").html());
    $(".tax").html($(".subtotal").html()*.10);
    $(".total").html(parseFloat($(".subtotal").html())+parseFloat($(".tax").html()));
    
}

console.log("go")
           $.ajax({
                type: "GET",
                url:  "api/GetRandomProduct.php",
                dataType: "json",
                data: { "promo": $("#promoBox").val() },  
                
                success: function(data,status) {
                    console.log("logging data");
                  console.log(data);
                  $(".productname").html(data["product"]);
                  $(".unit_price").html(data["price"]);
                  $(".quantity").html(data["qty"]);
                  updatePrice();
                },
                complete: function(data,status) { 
                    console.log(status);
                }
             }); 


        $("#promoBox").on("change", function() {
           console.log("hi");
            
           $.ajax({
                type: "GET",
                url:  "api/promocodeAPI.php",
                dataType: "json",
                data: { "promo": $("#promoBox").val() },  
                
                success: function(data,status) {
                    $(".discount").html(data);
                  console.log(data);
                  updatePrice();
                  
                },
                complete: function(data,status) { 
                    //console.log(status);
                }
             }); 
        });
        
        