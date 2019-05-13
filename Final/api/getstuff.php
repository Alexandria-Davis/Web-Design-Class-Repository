<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    $sql = "SELECT * from om_product WHERE 1";
    
    
    
    if (!empty($_GET['product'])){
        $sql = $sql." and productName like :productName";
       $namedParameters[":productName"] = "%{$_GET['product']}%";
    };
    
    $stmnt = $conn->prepare($sql);
    
    $stmnt->execute($namedParameters);
    $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($namedParameters);
    echo json_encode($records)
    
?>