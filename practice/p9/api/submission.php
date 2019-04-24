<?php

    session_start();

    include 'dbConnection.php';
    $conn = getDatabaseConnection("poll1");
    
    //$sql = "use poll1;";

    $named_params = array();
    

    if(isset($_SESSION) and /*empty($_SESSION["q1"]) and  */ isset($_GET["option"]))
    {
    //    echo("running");
    //    $sql = $sql."UPDATE `poll_response` SET option{$_GET['option']} = option{$_GET['option']} + 1 WHERE pollid = \"q1\";";
    //    //$named_params["option"] = "option{$_GET["option"]}";
    //    //$named_params["option2"] = "option{$_GET["option"]}";
        $_SESSION["q1"] = "answered";
        
    }
    
    
    //$sql = $sql.'select option1, option2, option3, option4, option5 from poll_response where pollid="q1";';
    


    
    $stmnt = $conn->prepare($sql);
    
    $stmnt->execute($named_params);
    $stmnt->debugDumpParams($named_params);
    //var_dump($temp);
    $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($namedParameters);
    echo (json_encode($records));
    



    
    
    if(isset($_SESSION) and !empty($_GET["reset_session"]))
    {
        session_destroy();
    }

?>