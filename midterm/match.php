<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>title</title>
        <link rel="stylesheet" href="css/css.css" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
			  <script type="text/javascript" src="js/js.js"></script>
            <script type="text/javascript" src="js/match.js"></script>
    </head>
    <body>
        <div class="linkbar centerme"><table>
            <tr>
                <td class="linkbarleft"><a href="match.php">Match</a></td><td class="linkbarright"><a href="history.php">History</a></td>
            </tr>
        </table></div>
        <div class="head centerme">Match</div>
        <div class="matched_user">
            <div class="description_area clearfix">
                <img src="" class="floated" id="profile_pic" alt="username head"></img>
                <div class="who">User: @<span id="username">username</span></div>
                <div class="description">This is where the description will go</div>
            </div>
            <div class="buttonbox">
                <button type="button">Dislike</button>
                <button type="button">?</button>
                <button type="button">like</button>
            </div>
        </div>
        
    </body>
</html>