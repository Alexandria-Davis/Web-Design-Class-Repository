var babynames = ["john","jane","jack","jill","dough","bob","candy","computer"]

var form = document.querySelector("babynames");
var submitButton = document.querySelector("#submit");
submitButton.addEventListener("click",submits);
var correctAnswer = babynames[Math.floor(Math.random()*babynames.length)];
console.log(correctAnswer);

for (var i=0; i < babynames.length; i++)
{
    var newdiv = document.createElement("div");
    var newradio = document.createElement("input");
    newradio.setAttribute("type","radio");
    newradio.setAttribute("name","bbname");
    newradio.setAttribute("class","bbname");
    newradio.setAttribute("value",""+i);
    newradio.setAttribute("id","bbname"+"name"+i)
    newdiv.appendChild(newradio);
    var newlabel = document.createElement("label")
    newlabel.setAttribute("for","bbname"+"name"+i)
    newlabel.innerHTML = babynames[i];
    newdiv.appendChild(newlabel)
    form.appendChild(newdiv);
}
function submits(){
    var choice = $("input[name='bbname']:checked").val();
    var namechoice = document.querySelector("label[for='bbnamename"+choice+"']").innerHTML;
    console.log(namechoice);
    var results = document.createElement("p")
    results.setAttribute("class","results")
    results.innerHTML = "FAIL!"
    if (namechoice === correctAnswer)
    {
        results.innerHTML = "SUCCESS!"
    }
    var body = document.querySelector("body")
    body.appendChild(results)
}