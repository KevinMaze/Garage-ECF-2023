const reload = document.querySelector('#reload')
reload.addEventListener('click', (e) => {
    e.preventDefault()
    window.location.reload()
})



const searchPrice = async () => {
    document.getElementById("response").innerHTML = ""
    let price = document.querySelector('#price').value
    console.log(price)
    if(price.length > 3) {
        const req = await fetch(`./lib/filter-price.php?price=${price}`)
        const json = await req.json()
        console.log(json)
        if(json.length > 0) {
            json.forEach((price) => {
                document.getElementById("response").innerHTML += `<div class="section-occasion-card">
                                                                    <img src="<?= $imagePath ?>" alt="<?= $imagePath ?>">
                                                                    <div class="section-occasion__div">
                                                                        <h2 class="title-h2">${price.name}</h2>
                                                                        <p class="occasion-para">Kilométrage : ${price.mileage}.</p>
                                                                        <p class="occasion-para">Année : ${price.year}.</p>
                                                                        <p class="occasion-para">Prix : ${price.price} €</p>
                                                                        <a href="occasion-page.php?id=${price.car_id}" class="custom-button">Voir l'annonce</a>
                                                                    </div>
                                                                </div>`
    
            })
        }
    }
}