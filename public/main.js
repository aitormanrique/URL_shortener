var endpoint = "https://www.jsonstore.io/8ba4fd855086288421f770482e372ccb5a05d906269a34da5884f39eed0418a1";

var hashh = window.location.hash.substr(1);

if (window.location.hash !== "") {
    $.getJSON(endpoint + "/" + hashh, function (data) {
        data = data["result"];

        if (data != null) {
            window.location.href = data;
        }
    })
}


function getrandom(){
    return random_string = Math.random().toString(32).substring(2, 5) + Math.random().toString(32).substring(2, 5);
}

function geturl(){
    var url = document.getElementById('urlinput').value;
    var protocol_ok = url.startsWith('http://') || url.startsWith('https://') || url.startsWith('ftp://');
    if(!protocol_ok){
        newurl = 'http://' +url;
        return newurl;
    } else {
        return url;
    }
}

function genhash(){
    // Example: if our URL is https://example.com/#abcd then the value of window.location.hash will be #abcd.
    if (window.location.hash === '') {
        window.location.hash = getrandom();
    }
}

// Important: add the send_request() function before the shorturl() function, otherwise it will not work.
function send_request(url) {
    this.url = url;
    $.ajax({
        url: endpoint + '/' + window.location.hash.substr(1),
        headers: {
            "X-Test-Header": "test-value",
            "Access-Control-Allow-Origin": "*",
            "Content-Type": "application/json"
        },
        method: "POST",
        data: JSON.stringify(this.url),
    }
    )
}

function shorturl(){
    var longurl = geturl();
    genhash();
    send_request(longurl);
}
