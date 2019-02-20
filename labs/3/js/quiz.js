var questions = [
    {
        Type: "radio",
        Question: "Of the following names, which one belongs to a character which is often bested by their own prey?",
        correctAnswer: ["Tom"],
        incorrectAnswers: ["Jill", "Jane", "Jerry"]
    },
    {
        Type: "radio",
        Question: "Of the following names, which one belongs to a character which is known for defeating feline preditors using comedic antics?",
        correctAnswer: ["Jerry"],
        incorrectAnswers: ["Jill", "Jane", "Tom", "Doe", "Daffy"]
    },
    {
        Type: "radio",
        Question: "<p>Answer this well known riddle:</p><quote><p>As I was going to St. Ives,</p><p>I met a man with seven wives,</p><p>Each wife had seven sacks,</p><p>Each sack had seven cats,</p><p>Each cat had seven kits:</p><p>Kits, cats, sacks, and wives,</p><p>How many were there going to St. Ives?</p></quote>",
        correctAnswer: ["1"],
        incorrectAnswers: ["7", "8", "9","2402","2403"]
    },
    {
        Type: "radio",
        Question: "This quiz was created and delivered in Javascript. What is NOT a consequence of this?",
        correctAnswer: ["It must always have access to the node.js server to work"],
        incorrectAnswers: ["Someone who didn't want to actually take the quiz could search the code for the answer", "The javascript allows the page to change without reloading", "Tools such as nojs will often break the site unless the source is whitelisted", "Data can be systematically added to the page without extra effort"]
    },
        {
            Type: "checkbox",
        Question: "Most forms of weather can have adverse effects on human technology. Select all that are known to make it difficult to use screens.",
        correctAnswer: ["Bright and Sunny", "Rainy"],
        incorrectAnswers: ["Overcast","All of the above", "None of the above"]
    },
    {
        Type: "Radio",
        Question: "You a variable in Javascript. You set this variable to the string 'False'.",
        correctAnswer: ["The variable is Truthy"],
        incorrectAnswers: ["The variable is Falsy"]
    }
    ];

var form = document.querySelector("quiz");
var submitButton = document.querySelector("#submit");
submitButton.addEventListener("click",submits);
generate_quiz(questions)

function generate_quiz(questions) {
    var form = document.querySelector("quiz")
    for (var i = 0; i < questions.length; i++)
    {   
        var question = document.createElement("question");
        question.setAttribute("qustionNumber",i);
        
        var actual_question = document.createElement("Problem");
        actual_question.innerHTML = questions[i].Question;
        question.appendChild(actual_question)
        
        var allAnswers = questions[i].correctAnswer.concat(questions[i].incorrectAnswers);
        shuffleArray(allAnswers);
        console.log(allAnswers)
        for (var j = 0; j < allAnswers.length; j++)
        {
            var answer = document.createElement("answer");
            
            var marker = document.createElement("input");
            marker.setAttribute("type",questions[i].Type);
            marker.setAttribute("name", "question"+i);
            marker.setAttribute("id","question"+i+"answer"+j);
            answer.appendChild(marker);

            
            var answer_label = document.createElement("label");
            answer_label.setAttribute("for", "question"+i+"answer"+j);
            answer_label.innerHTML = allAnswers[j];
            answer.appendChild(answer_label);
            question.appendChild(answer);
        }
        form.appendChild(question)
    }
}
function shuffleArray(array) {
    /* Shuffle function from https://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
    */
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}
function submits() {
    
}

/*
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
*/