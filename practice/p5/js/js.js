/*global $*/
function dosomething(action)
{
  $.ajax({
    type: "get",
    url: "https://cst336.herokuapp.com/projects/api/videoLikesAPI.php",
    dataType: "json",
    data: { "videoId": "dQw4w9WgXcQ",
            "action" : action,
    }, //   <----AS THE VALUE, ENTER THE YOUTUBE VIDEO ID

    success: function(data, status) {
      $("#likes").html(data.likes);
      $("#dislikes").html(data.dislikes);
      $("#cancelLike").css("display", "none");
      $("#cancelDislike").css("display", "none");
    },
    complete: function(data, status) {
      //alert(status);
    }
  });


}

function dosomething2(action)
{
  $.ajax({
    type: "get",
    url: "https://cst336.herokuapp.com/projects/api/videoLikesAPI.php",
    dataType: "json",
    data: { "videoId": "dQw4w9WgXcQ",
            "action" : action,
    }, //   <----AS THE VALUE, ENTER THE YOUTUBE VIDEO ID

    success: function(data, status) {
      for (var i=0; i < data.length; i++)
      {
          var comment = document.createElement('comment');
          var commenthead = document.createElement('commenthead');
          comment.appendChild(commenthead);
          commenthead.innerHTML = `<span class="comment_author">${data[i].author}</span><span class="postdate">${data[i].date}</span>`;
          
          var commentbody = document.createElement("commentbody");
          comment.appendChild(commentbody);
          commentbody.innerHTML = data[i].comment;
          
          document.querySelector("comments").appendChild(comment);
      }
    },
    complete: function(data, status) {
      //alert(status);
    }
  });


}


  function ajaxCall(action) {
      console.log("doing stuff")
    if (action == "like") {
      $("#likes").html("<img src='http://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif'>");
      $("#likes").hide();
      $("#cancelLike").show();
    }
    if (action == "cancel_like") {
      $("#cancelLike").hide();
      $("#likes").show();
    }
    if (action == "dislike"){
      $("#likes").hide();
      $("#cancelLike").show();
    }
    if (action == "cancel_dislike") {
      $("#cancelDislike").hide();
      $("#likes").show();
    }
  }
  
$('#showcomments').bind('click', function() {ajaxCall('comments'); }  );
$("#likes").bind('click', function() {ajaxCall('like'); }  );
  $("#dislikes").bind('click', function() {ajaxCall('dislike'); }  );
  $("#cancelLike").bind('click', function() {ajaxCall('cancel_like'); }  );
  $("#cancelDislike").bind('click', function() {ajaxCall('cancel_dislike'); }  );