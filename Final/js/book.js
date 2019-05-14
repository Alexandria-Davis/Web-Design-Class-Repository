/*global $*/
$(document).ready(function () {
    function go () {
        $.ajax({
            type: "GET",
            url: "api/get_free.php",
            dataType: "json",
            data: {
                user: $("#id").val(),
            },
            complete: function(data,status){
                
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
                    field.innerHTML = data[i]["by"];
                    row.appendChild(field);
                    field.innerHTML = `<button id="detail_${data[i]['id']}" type="button">details</button>`;
                    row.appendChild(field);
                    var field = document.createElement('td');
                    field.innerHTML = `<button class= "book" id="${data[i]['id']}" type="button">Book</button>`;
                    row.appendChild(field);
                }
                
            }
        })
    }
        go();
        $('table').on('click', '.book', book);
     function book () {
        $.ajax({
            type: "POST",
            url: "api/book.php",
            dataType: "json",
            data: {
                user: $("[name=uid]").val(),
                appointment: this.id,
            },
            success: function(data,status){
                
            },
            complete: function(data, status){
                document.getElementById("event_table").innerHTML = `
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
                `
                ;
                go();
            }
        })
        
    }
    
})