let list = document.getElementsByClassName("nav__list")[0]
let hamburger = document.getElementsByClassName('nav__hamburger')[0]
hamburger.addEventListener('click', () => {
    list.classList.toggle('active')
})