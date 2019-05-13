<!DOCTYPE html>
<html lang=en>
    <head>
    <?php
        include_once "Pagetools/head.php"
    ?>
    </head>
    <body>
        <?php
            $page = "login";
            include_once "Pagetools/nav.php"
        ?>
        <div class="main d-flex align-items-center justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Sign Up</div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Username</span>
                        </div>
                        <input type="text" name="username"/>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="password" name="password"/>
                    </div>
                    <div>
                        <button type="button" class="signup">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="js/signup.js"></script>