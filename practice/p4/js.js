shipping /*global shipping*/ = [{
        Name: "Next-day Delivery",
        Price: 15.00
    },
    {
        Name: "Three-day Delivery",
        Price: 10.00
    },
    {
        Name: "Regular (5-8 days)",
        Price: 5.00
    }
];

build();

var inputs = document.querySelectorAll("input");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", build);
}
inputs = document.querySelectorAll("select");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", build);
}

    document.querySelector("button").addEventListener("click",submit)


var shipping_val = document.getElementById("shipping");
for (var i = 0; i < shipping.length; i++) {
    var shipping_rate = document.createElement("option");
    shipping_rate.innerHTML = shipping[i].Name;
    shipping_rate.setAttribute("value", shipping[i].Price);
    shipping_val.appendChild(shipping_rate);
}



function submit(){
    console.log("good thing there is exactly one button")   
}

build;

function build() {

    var total_price = 0;
    var total_price_shipping;

    var rows = document.querySelectorAll("tr");
    for (var i = 1; i < rows.length; i++) {
        var currentrow = rows[i].childNodes;
        if (currentrow[5].childNodes) {
            if (currentrow[5].childNodes[0]) {
                if (currentrow[5].childNodes[0].getAttribute("type") === "text") {
                    var unit_price = currentrow[3].innerHTML;
                    unit_price = unit_price.substr(1, unit_price.length - 1);

                    var input_area = currentrow[5].childNodes[0];
                    `$${unit_price*input_area.value}`;
                    currentrow[7].innerHTML = `$${unit_price*input_area.value}`;

                    total_price += unit_price * input_area.value;

                }
            }

        }

    }
    var shipping_price = document.getElementById("shipping").value;
    console.log(shipping_price);


    total_price_shipping = total_price + shipping_price;
    var shippingbox = document.getElementById("shipping_and_handling");
    shippingbox.innerHTML = `$${shipping_price}`;


    var subtotalbox = document.getElementById("subtotal");
    subtotalbox.innerHTML = `$${total_price+shipping_price}`;
    
    var taxbox = document.getElementById("tax");
    taxbox.innerHTML = `$${(total_price+shipping_price) * .1}`;
    
    var totalbox = document.getElementById("total");
    totalbox.innerHTML = `$${(total_price+shipping_price) * 1.1}`;
}
