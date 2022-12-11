const getPosts = () => {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementsByClassName('main')[0].innerHTML += xmlhttp.responseText
        }
    }
    xmlhttp.open('GET', 'routes/getPosts.php', true)
    xmlhttp.send()
}

getPosts()