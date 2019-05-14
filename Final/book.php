<!DOCTYPE html>
<html lang=en>
    <head>
    <?php
        include_once "Pagetools/head.php"
    ?>
    </head>
    <body>
        <input type="hidden" id="id" name="uid" value="<?php echo $_GET["user"]?>"/>
        <?php
            $page = "home";
            include_once "Pagetools/nav.php"
        ?>
        
        <div class="invite">
            <label for="Invintation_link">Invitation Link</label>
            <input type="text" class="linkbox" name="Invintation_link"/>
            <button type="button">copy</button>
        </div>
        <div>
            <a href="add_event.php">Add Appointment Slot</a>
        </div>
        <table id="event_table">
            <tr>
                <th>date</th>
                <th>
                    Start time
                </th>
                <th>
                    End time
                </th>
                <th>
                    Details
                </th>
                <th>
                    Book
                </th>
                <th></th>
            </tr>
        </table>
        
    </body>
    <script type="text/javascript" src="js/book.js"></script>
</html>