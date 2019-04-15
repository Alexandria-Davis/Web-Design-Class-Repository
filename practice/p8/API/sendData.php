<?php
include 'DBConnection.php';
session_start();
$conn = getDBConnection();

// TODO: Grab all of our paramters from the session
$parameters[":name"]= $_SESSION["name"];
$parameters[":zip"]= $_SESSION["zip"];
$parameters[":email"]= $_SESSION["email"];
$parameters[":major"]= $_SESSION["major"];


// TODO: Execute SQL to add a row to database table
$sql = "insert into users (name, major, email, zip) values (:name,:major,:email,:zip)";
$qury = $conn->prepare($sql);
$qury->execute($parameters);


// Destory the session once you submit
session_destroy();

// TODO: Return all the rows from the datable table

?>
