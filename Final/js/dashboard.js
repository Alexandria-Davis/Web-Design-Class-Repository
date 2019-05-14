/*global $*/
$(document).ready(function () {
    $.ajax({
            type: "GET",
            url: "api/get_appointments.php",
            dataType: "json",
            complete: function(data,status){
                $(".linkbox").val(`${window.location.hostname}/Final/book.php?user=${$("#uid").val()}`)
            },
            success: function(data, status){
                console.log(data);
                var table = document.getElementById("event_table");
                for (var i = 0; i < data.length; i++)
                {
                    var row = document.createElement('tr');
                    table.appendChild(row);
                    var field = document.createElement('td');
                    field.innerHTML = data[i]["date"];
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = data[i]["start"];
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = data[i]["end"];
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = data[i]["username"];
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = `<button id="detail_${data[i]['id']}" type="button">details</button>`;
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = `<button id="drop_${data[i]['id']}" type="button">remove</button>`;
                    row.appendChild(field);
                }
                
            }
        })
})