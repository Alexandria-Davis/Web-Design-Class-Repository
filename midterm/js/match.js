$(document).ready(
    function(){
        
        function getusers()
        {
        $.ajax({
            type: "GET",
            url: "api/getUsers.php",
            dataType: "json",
            data: {
            
            },
            success: function(data,status){
                next_page(data, 0);
                return data;
            },
            complete: function(data, status){
                
            }
        });
        }
        function next_page(users, current_page)
        {
            $("#username").html(users[current_page]['username']);
            $(".description").html(users[current_page]['about_me']);
            console.log(users[current_page]['about_me']);
            $("#profile_pic").attr("src",users[current_page]['picture_url']);
            current_page++;
            if (current_page == users.length)
            {
                //disable stuff
            }
            return current_page;
        }
        
        var users = getusers();
        var current_page = 1;
        
        

        
})