<?php


function getDatabaseConnection($dbname = 'tcp'){
    
    $host = 'localhost';//cloud 9
    //$dbname = 'tcp';
    $username = 'root';
    $password = '';
    
    //using different database variables in Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $_ENV["db_host"];
        $dbname = $_ENV["db_name"];
        $username = $_ENV["db_user"];
        $password = $_ENV["db_pass"];
    } 
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
    
}




?>