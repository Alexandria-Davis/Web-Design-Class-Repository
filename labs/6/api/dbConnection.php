<?php
function getDatabaseConnection($dbname = 'ottermart')
{
    $database_name = $_ENV["db_name"]?:$dbname;
    $host= $_ENV['db_host']?:'localhost';
    $username=$_ENV["db_user"]?:'alexandriadavis';
    $password = $_ENV["db_pass"]?:'';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$database_name",$username,$password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>