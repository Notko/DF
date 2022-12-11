const getPost = (id) => {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (!xmlhttp.responseText) window.location.href = "index.php";
            document.getElementsByClassName('main')[0].innerHTML += xmlhttp.responseText
        }
    }
    xmlhttp.open('GET', 'routes/getPost.php?id=' + id, true)
    xmlhttp.send()
}


let url_string = window.location;
let url = new URL(url_string);
let id = url.searchParams.get("id");
getPost(id)