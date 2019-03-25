function get_password()
{
    /*global $*/
        $.ajax({
        type: "POST",
        url: "https://homework1-alexandriadavis.c9users.io/labs/5/api.php",
        dataType: "json",
        data: {
            "todo":"suggest_password"
        },
        success: function(data, status) {
           console.log(data)
        },
        complete: function(data, status) { //optional, used for debugging purposes
            console.log(`status: ${status}`);
        }
    });
}