<!DOCTYPE html>
<?php
function connectDB(){
    $host = "localhost";
    $dbname = "midterm1";
    $user ="alexandriadavis";
    $pass = "";
    
    $dsn="mysql:host={$host};dbname={$dbname};";
    
    $opt = [
        ];
    
    $pdo = new PDO($dsn,$user,$pass,$opt);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    };
    function getproduct($pdo){
        $query = "select * from mp_product";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $records = $statement.fetchAll(PDO::FETCH);
    };
?>
<html>
    <head>
        <link rel="stylesheet" href="css/css.css" type="text/css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <table>
            <tr>
                <th>
                    Product
                </th>
                <th>
                    Unit Price
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Total
                </th>
            </tr>
            <tr class="product">
                <td class="productname"></td>
                <td class="unit_price"></td>
                <td class="quantity"></td>
                <td class="utotal"></td>
            </tr>
            <tr>
                <td>Discount</td>
                <td></td>
                <td class="discount"></td>
                <td class="dtotal"></td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td></td>
                <td></td>
                <td class="subtotal"></td>
            </tr>
            <tr>
                <td>Tax (10%)</td>
                <td></td>
                <td></td>
                <td class="tax"></td>
            </tr>
            <tr>
                <td>Total</td>
                <td></td>
                <td></td>
                <td class="total"></td>
            </tr>
        </table>
        <div class="discountarea">
            <label for="promocode">Promo Code</label><input type="text" id="promoBox" name="promocode"/>
        </div>
    </body>
    <script type="text/javascript" src="product.js"></script>
    <script>
    /* global $ */
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
        
        
    </script>
</html>