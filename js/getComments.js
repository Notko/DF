const getComments = (id, button) => {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (!xmlhttp.responseText) return

            if (document.querySelector('[data-post-card-id="' + id + '"]').classList.contains('show-replies')) {
                document.querySelector('[data-post-card-id="' + id + '"]').classList.remove('show-replies')
                document.querySelector('[data-comment-wrapper-id="' + id + '"]').remove()
                button.getElementsByClassName('fa-solid')[0].classList.remove('fa-chevron-up')
                button.getElementsByClassName('fa-solid')[0].classList.add('fa-chevron-down')
            } else {
                document.querySelector('[data-post-card-id="' + id + '"]').classList.add('show-replies')
                document.querySelector('[data-post-id="' + id + '"]').insertAdjacentHTML("afterend", xmlhttp.responseText)
                button.getElementsByClassName('fa-solid')[0].classList.remove('fa-chevron-down')
                button.getElementsByClassName('fa-solid')[0].classList.add('fa-chevron-up')
            }

            document.querySelector('[data-post-card-id="' + id + '"]').scrollIntoView({behavior: "smooth"})
        }
    }
    xmlhttp.open('GET', 'routes/getComments.php?id=' + id, true)
    xmlhttp.send()
}

let buttons = document.getElementsByClassName('post-card__reply')

Array.from(buttons).forEach((button) => {
    button.addEventListener('click', () => {
        getComments(button.attributes['data-post-id'].value, button)
    })
})