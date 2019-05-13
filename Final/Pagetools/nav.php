<?php
    $pages = [
        ["display"=>"home", "route"=>"home.php"],
        ["display"=>"login", "route"=>"login.php"],
        ["display"=>"signup", "route"=>"signup.php"]
        ]
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
            <?php foreach($pages as $current_page):?>
            
            
            <li class="nav-item nav_to_<?php echo $current_page['display'] ?>">
                <a class="nav-link" href="<?php echo $current_page['route']; ?>">
                    <?php echo $current_page['display']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
<input type="hidden" name="active_page" value="<?php echo $page ?>">