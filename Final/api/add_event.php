<?php
session_start();
    if (empty($_SESSION["user"]))
    {
    http_response_code(302);
    echo "Please log in to access this";
    exit();
    }

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
        include "dbConnection.php";
        $success = $conn->add_event($_GET["start"], $_GET["end"], $_GET["date"],$_GET["details"]);
        echo(json_encode($success));
        return;
        
        //http_response_code(401);
        //echo "Not Supported";

        break;
      case 'POST':
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        include "dbConnection.php";
        $success = $conn->add_event($_POST["start"], $_POST["end"], $_POST["date"],$_POST["details"]);
        $_SESSION["started"] = true;
        echo(json_encode($success));
        return;
        
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
