var agro_key = "e923e8d96f2539204a13fd834763a2a2"
var google_key = "AIzaSyBsujN2mHjYPh3REuCIVFUJ4kt-GUEoAzg"
function get_googles(){
    $.getScript("https://maps.googleapis")
    $.ajax({
        type:"get",
        url: "https://maps.googleapis.com/maps/api/js?",
        data: {
            "key":google_key
        }
        })
}
function get_agro(){
    $.ajax(
        )
        
}