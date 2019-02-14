<?php 
        if (isset( $_GET['page'] ) ) {
                $page = $_GET['page']; 
        }
        else {
                $page = 'main';
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Design Patterns</title>
        <link rel="stylesheet" type="text/css" href="css/external.css">
</head>
<body>
        <div class="body">
        <!-- The html validator did not like how we did this in class, so I resorted to the use of divs. -->
        <div class="head">
                <div class="header">
                        <img src="images/banner.jpg" id="bannerjpg" alt="Site Banner"><!-- Image source: https://pixabay.com/en/banner-header-binary-null-one-904887/ -->
                                Design Patterns
                </div>
                <div class="navigation_menu">
                        <!-- PHP include was used to keep things consistent across pages -->
                        <?php include "navigation.php"; /*Display Navigation*/?>
                </div>
        </div>
                <div class="content">
                        <!-- Content is also inserted into the page here for consistency -->
                        <?php 
                                if (is_file("${page}.php")){
                                        include "${page}.php";
                                }
                                else {
                                        include "404.php";
                                }
                        
                        ?>
                </div>
                        <div class="footer">copyright alexandria davis 2019</div>
        </div>

</body>
</html>