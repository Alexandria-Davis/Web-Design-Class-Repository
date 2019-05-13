<!DOCTYPE html>
<html lang=en>
    <head>
    <?php
        include_once "Pagetools/head.php"
    ?>
    </head>
    <body>
        <?php
            $page = "dashboard";
            include_once "Pagetools/nav.php"
        ?>
                <div class="main d-flex align-items-center justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create an event</div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Date</span>
                        </div>
                        <input type="date" name="date"/>
                    </div>
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Start</span>
                        </div>
                        <input type="time" name="start"/>
                    </div>
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">End</span>
                        </div>
                        <input type="time" name="end"/>
                    </div>
                    
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Details</span>
                        </div>
                        <textarea name="details" multiple></textarea>
                    </div>
                    
                    
                    <div>
                        <button type="button" class="submit">Add event</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="js/new_event.js"></script>