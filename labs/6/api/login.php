<?php
    include "usertools.php";

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
        http_response_code(403);
        echo "Access denied - please use post requests instead";
        break;
      case 'POST':
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        $args["usr"] = $_POST['username'];
        $args["pass"] = encrypt($args["usr"], $_POST['password']);
        
        include "dbConnection.php";
        $conn = getDatabaseConnection("ottermart");
        
        
        $sql = "SELECT userId FROM om_user where username = :usr and password = :pass";
        //$np = array();
        //$np[':pId'] = $pid;
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $part = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($part))
        {
          echo json_encode("{'login' = 'no'}");
          
          break;
        }
        $part["login"] = "yes";
        
        $_SESSION["token"] = $part["token"];
        $_SESSION["user"] = $part["username"];
        
        $goal = json_encode($part);
        echo $goal;
        
        break;
      case 'PUT':
        header("Access-Control-Allow-Origin: *");
        http_response_code(401);
        echo "Not Supported";
        break;
      case 'DELETE':
        header("Access-Control-Allow-Origin: *");
        http_response_code(401);
        break;
    }
?>
