<input type="text" id="url" name="url" value=""/>
$("[name=url]").val()


<input type="radio" id="url" name="url" value="value"/>
//get the checked value
$("[name=url]:checked").val()

<input type="checkbox" id="url" name="url" value="value"/>
//get an array of checked values
checked = $("[name=url]:checked").map(function(){
    $(this).val() //get() makes it an array
}).get()