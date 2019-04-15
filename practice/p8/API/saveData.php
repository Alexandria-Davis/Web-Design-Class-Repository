<?php
session_start();
//TODO: Save incoming data into session

if(!isset($_SESSION["progress"])){
    $_SESSION["progress"] = 0;
}
if($_SESSION["progress"] >= 3)
{
    $_SESSION["ready"] = true;
}
foreach($_POST as $key => $value)
{
    $_SESSION[$key] = $value;
}
//$_SESSION["progress"]+=1;

//session_destroy();

echo json_encode($_SESSION);
?>