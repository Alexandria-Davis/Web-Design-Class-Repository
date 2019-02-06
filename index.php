<?php 
        if isset $_GET['page'] {
                $page = $_GET['page']; 
        }
        else {
                $page = 'main';
        }
?>
<head>
        <title>Design Patterns</title>
        <link rel="stylesheet" type="text/css" href="css/external.css">
</head>
<body>
        <header>
                <h>Design Patterns</h>
        </header>
        <navigation>
                <?php include "navigation.php"; /*Display Navigation*/?>
        </navigation>
        <content>
        content
                <?php include "${page}.php"?>
        </content>
</body>
