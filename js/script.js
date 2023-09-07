
// defilement vers le haut avec flèche
const btn = document.querySelector('.button-up')

btn.addEventListener('click', () => {

    window.scrollTo({
        top:0,
        left:0,
        behavior: "smooth",
        })
})

// modal de suppression
const btnDelete = document.querySelector(".delete")
btnDelete.addEventListener('click', () => {
    return confirm ('Êtes-vous sûr de vouloir supprimer cet article ?')
})