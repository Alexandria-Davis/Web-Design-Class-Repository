<?php

    include 'dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    $sql = "select catID, catName from om_category ORDER BY catName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records)
    
    

?>