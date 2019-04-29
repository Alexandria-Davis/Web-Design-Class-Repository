<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection("Quiz");
    
    $sql = "SELECT `email`, `score`, `taken` from quiz WHERE 1 and email=:email";
    
    
    if (!empty($_GET['email'])){
       $namedParameters[":email"] = $_GET['email'];
    };
    
    $stmnt = $conn->prepare($sql);
    
    $stmnt->execute($namedParameters);
    $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($namedParameters);
    echo json_encode($records);
    
        if (!empty($_GET['score'])){
       $namedParameters[":score"] = $_GET['score'];
       
    };
    
    
    $sql = "Insert into `quiz` (email, score, taken) values (:email, :score, 1)
    ON DUPLICATE KEY UPDATE `taken` = taken+1, `score` = :score";
    $stmnt = $conn->prepare($sql);
    
    $stmnt->execute($namedParameters);


?>