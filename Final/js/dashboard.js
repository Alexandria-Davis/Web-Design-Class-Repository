/*global $*/
$(document).ready(function () {
    $.ajax({
            type: "GET",
            url: "api/get_appointments.php",
            dataType: "json",
            success: function(data,status){
                
            },
            complete: function(data, status){
                data = data['responseJSON']
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
                    field.innerHTML = data[i]["by"];
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = `<button id="detail_${data[i]['id']}" type="button">details</button>`;
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = `<button id="drop_${data[i]['id']}" type="button">remove</button>`;
                    row.appendChild(field);
                    //var row = `<td>${data[i]["date"]}</td><td>${data[i]["start"]}</td><td>${data[i]["end"]}</td><td>${data[i]["by"]}</td><td><button id="detail_${data[i]['id']}" type="button">details</button></td><td><button type="button" id="stop_${data[i]['id']}">drop</button></td>`;
                }
                
            }
        })
})