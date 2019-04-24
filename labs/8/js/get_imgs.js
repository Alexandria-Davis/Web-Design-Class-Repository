$(document).ready(function(){
    /* global $ */
    var columns = [];
    columns.push(document.getElementById("col0"));
    columns.push(document.getElementById("col1"));
    columns.push(document.getElementById("col2"));

            

        $.ajax({
            type: "GET",
            url: "api/get_pix.php",
            dataType: "json",
            data: {
                query:"cat",
            },
            success: function(data,status){
                
                
                for (var i = data["images"].length; i--; ) {
                    var col = (i)%columns.length;
                    /*Prepare image*/
                    var newimg = document.createElement("img");
                    newimg.setAttribute("src", data["images"][i]["url"]);
                    newimg.setAttribute("class","resulting_image");
                    /*Prepare image box*/
                    var newimgbox = document.createElement("div")
                    newimgbox.setAttribute("class",`imagebox`)
                    newimgbox.setAttribute("id", data["images"][i]["id"])
                    newimgbox.appendChild(newimg)
                    /*check other server for stuff (can I just stick in a promise?)*/
                    
                    /*Finish up*/
                    columns[col].appendChild(newimgbox);
                }
                
                
                add_extras();
                
                
            },
            complete: function(data, status){
                
            }
        })
});

function add_extras()
{
    var liked = [];
    $(".imagebox").each(function() {
        var buttonbox = document.createElement("div");
        this.appendChild(buttonbox);
        
        var likebutton = document.createElement("img");
        likebutton.setAttribute("src","img/favorite.png");
        likebutton.setAttribute("alt","like");
        likebutton.setAttribute("class","rate like");
        likebutton.setAttribute("id", `like_${this.id}`)
        
        var unlikebutton = document.createElement("img");
        unlikebutton.setAttribute("src","img/favorite-on.png");
        unlikebutton.setAttribute("alt","unlike");
        unlikebutton.setAttribute("class", "rate unlike");
        unlikebutton.setAttribute("id", `unlike_${this.id}`)
        
        buttonbox.appendChild(likebutton);
        buttonbox.appendChild(unlikebutton);
        
        liked.push(this.id);
        
    })
    
    get_liked(liked);
}

function get_liked(liked)
{
    console.log(liked)
}