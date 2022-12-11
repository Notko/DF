const getPostsByTopic = () => {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementsByClassName('main')[0].innerHTML += xmlhttp.responseText
        }
    }
    xmlhttp.open('GET', 'routes/getPostsByTopic.php?topic_id=' + id, true)
    xmlhttp.send()
}

let url_string = window.location;
let url = new URL(url_string);
let id = url.searchParams.get("topic_id");
getPostsByTopic(id)