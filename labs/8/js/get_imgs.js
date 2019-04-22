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
                    console.log(`Column: ${col}, output: ${i}`);
                    /*Prepare image*/
                    var newimg = document.createElement("img");
                    newimg.setAttribute("src", data["images"][i]["url"]);
                    newimg.setAttribute("class","resulting_image");
                    /*Prepare image box*/
                    var newimgbox = document.createElement("div")
                    newimgbox.setAttribute("class","imagebox")
                    newimgbox.appendChild(newimg)
                    /*check other server for stuff (can I just stick in a promise?)*/
                    
                    /*Finish up*/
                    columns[col].appendChild(newimgbox);
                }
            },
            complete: function(data, status){
                
            }
        })
});