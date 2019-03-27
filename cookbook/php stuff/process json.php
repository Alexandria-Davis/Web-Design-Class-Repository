<?php
function get_data()
{
    $rawJsonString = file_get_contents("php://input")
    $rawJsonData = json_decode($rawJsonString, true) //true says associative array
}
function give_data($rawJsonData)
{
    header("Content-Type: application/json") //yay now you know what it is
    echo json_encode($rawJsonData)
}

?>