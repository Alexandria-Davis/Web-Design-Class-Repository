<?php
    include "dbConnection.php";
    $conn = getDatabaseConnection("ottermart");
    
    $pid = $_GET['productId'];
    
    $sql = "SELECT * FROM om_product NATURAL JOIN om_purchase WHERE productId = :pId";
    $np = array();
    $np[':pId'] = $pid;
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $part = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $goal = json_encode($part);
    echo $goal;
?>