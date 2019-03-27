
/*global $*/
var getDiscount = function($data)
{
    if ($data)
    {
        if ($data["discount"])
        {
            var today = new Date();
            var end = new Date($data['expirationDate']);
            if (today < end)
            {            
                $(".discount").html(`${$data["discount"]}`);
                
                $(".codeError").html("")
            }
            else
            {
                $(".discount").html("0");
                $(".codeError").html(`Code expired on ${$data['expirationDate']}`);
            }
        }
    }
    else
    {
        $(".discount").html("0");
        $(".codeError").html("Code not found");
    }
};
var updatePrice = function()
{
    var price =  $(".unit_price").html();
    var quantity = $(".quantity").html();
    
    $(".utotal").html(  price*quantity  );
    $(".dtotal").html(`${  $(".discount").html() * $(".utotal").html()/100.0  }` );
    //console.log(` total = ${  $(".discount").html() * $(".utotal").html()/100.0  }`)
    $(".subtotal").html($(".utotal").html() - $(".dtotal").html());
    $(".tax").html($(".subtotal").html()*.10);
    $(".total").html(parseFloat($(".subtotal").html())+parseFloat($(".tax").html()));
    
}
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
            
           $.ajax({
                type: "GET",
                url:  "api/promocodeAPI.php",
                dataType: "json",
                data: { "promo": $("#promoBox").val() },  
                
                success: function(data,status) {
                  console.log(data);
                  getDiscount(data);
                  
                },
                complete: function(data,status) { 
                    console.log(status);
                }
             }); 
        });
        
        