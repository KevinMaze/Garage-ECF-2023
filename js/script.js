
// defilement vers le haut avec flèche
const btn = document.querySelector('.button-up')

btn.addEventListener('click', () => {

    window.scrollTo({
        top:0,
        left:0,
        behavior: "smooth",
        })
})

