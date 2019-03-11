


<?php
  session_start();

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case "GET":
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");


$products = array(
['product'=>"Microfiber Beach Towel", 'price'=>40, 'qty'=>2],
['product'=>"Flip-flop Sandals", 'price'=>30, 'qty'=>5],
['product'=>"Sunscreen 80SPF", 'price'=>25, 'qty'=>3],
['product'=>"Plastic Flying Disc", 'price'=>15, 'qty'=>4],
['product'=>"Beach Umbrella", 'price'=>75, 'qty'=>1],

);

//var_dump( $products );
//var_dump( $products[1])
$randnum = rand(0,4);
$results =  $products[$randnum];



        // TODO: do stuff to get the $results which is an associative array
        //$results = array();

        // Sending back down as JSON
        echo json_encode($results);

        break;
      case 'POST':
        // Get the body json that was sent
        $rawJsonString = file_get_contents("php://input");

        //var_dump($rawJsonString);

        // Make it a associative array (true, second param)
        $jsonData = json_decode($rawJsonString, true);

        // TODO: do stuff to get the $results which is an associative array
        $results = $getproduct();
        echo $results;
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");

        // Sending back down as JSON
        echo json_encode($results);

        break;
      case 'PUT':
        // TODO: Access-Control-Allow-Origin
        http_response_code(401);
        echo "Not Supported";
        break;
      case 'DELETE':
        // TODO: Access-Control-Allow-Origin
        http_response_code(401);
        break;
    }
?>

<?php
$getproduct = function() {
$products = array(
['product'=>"Microfiber Beach Towel", 'price'=>40, 'qty'=>2],
['product'=>"Flip-flop Sandals", 'price'=>30, 'qty'=>5],
['product'=>"Sunscreen 80SPF", 'price'=>25, 'qty'=>3],
['product'=>"Plastic Flying Disc", 'price'=>15, 'qty'=>4],
['product'=>"Beach Umbrella", 'price'=>75, 'qty'=>1],

);

//var_dump( $products );
//var_dump( $products[1])
$randnum = rand(0,4);
return $products[$randnum];
}
?>