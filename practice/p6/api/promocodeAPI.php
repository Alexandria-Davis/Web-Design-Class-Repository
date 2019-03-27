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
    }
    
function getpromo($pdo, $promo){
        $query = "select discount, expirationDate from mp_codes where promoCode = '" . $promo . "';"; //error when trying to escape string
        $statement = $pdo->prepare($query);
        $statement->execute();
        $records = $statement->fetch(PDO::FETCH_ASSOC);
        return $records;
    };
    
    
?>


<?php
/*
$getpromo = function() {
  $promos = array(
    "getFifty" => 50,
    "halfPrice" => 50,
   "sand30" => 30, 
   "spring30" => 30,
   "beach" => 20,
   "sunny" => 20
    );
  //$promos[] = "halfPrice";
  //$promos[] = "Fr33AF";
  //array_push($promos, "noSHIPcostYO", "quarterPrice", "WEpayYOU");
  $promo = array();
  $code = $_GET['promo'];
  if($promos[$code]){
    return $promos[$code];
    }
  else {
    return 0;
  }
};
*/
?>
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

        // TODO: do stuff to get the $results which is an associative array
        $dbo = connectDB();
        $results =  getpromo($dbo,$_GET['promo']);

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
        $results = array();

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