<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    $sql = "SELECT productId as pid, productName as name, productDescription as description, price as price, productImage as image_url, catID as catID from om_product WHERE 1";
    
    $namedParameters = [];
    
    if (!empty($_GET['product'])){
        $sql .=  " and productName like :productName";
       $namedParameters["productName"] = "%{$_GET['product']}%";
    };
    if (!empty($_GET['category'])){
        $sql .= " and catID = :category";
       $namedParameters["category"] = $_GET['category'];
    };
    if (!empty($_GET['price_from']))
    {
        $sql .= " and price >= :minPrice";
        $namedParameters["minPrice"] = $_GET['price_from'];
    }
    if (!empty($_GET['price_to']))
    {
        $sql .= " and price <= :maxPrice";
        $namedParameters["maxPrice"] = $_GET['price_to'];
    }
    if (isset($_GET["order_by"]) and !empty(($_GET["order_by"])))
    {
        if ($_GET["order_by"] == "price")
            $sql .= " ORDER BY price asc";
        if ($_GET["order_by"] == "name")
            $sql .= " ORDER BY name asc";
    }
    //price_from=&price_to=
    
    $stmnt = $conn->prepare($sql);
    $stmnt->execute($namedParameters);
    $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records)
    
?>