const reload = document.querySelector('#reload')
reload.addEventListener('click', (e) => {
    e.preventDefault()
    window.location.reload()
})


let imagePath = "./upload/cars/"
const imagePathName = async () => {
    if(price.name_image ===""){
        imagePath = "./assets/default.jpg";
    }else{
        imagePath = "./upload/cars/" + price.name_image;
}
}


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
                <img src="${imagePath}${price.name_image}" alt="${imagePath}">
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

const searchMileage = async () => {
    document.getElementById("response").innerHTML = ""
    let mileage = document.querySelector('#mileage').value
    console.log(mileage)
    if(mileage.length > 1) {
        const req = await fetch(`./lib/filter-mileage.php?mileage=${mileage}`)
        const json = await req.json()
        console.log(json)
        if(json.length > 0) {
            json.forEach((mileage) => {
                document.getElementById("response").innerHTML += `<div class="section-occasion-card">
                                                                    <img src="<?= $imagePath ?>" alt="<?= $imagePath ?>">
                                                                    <div class="section-occasion__div">
                                                                        <h2 class="title-h2">${mileage.name}</h2>
                                                                        <p class="occasion-para">Kilométrage : ${mileage.mileage}.</p>
                                                                        <p class="occasion-para">Année : ${mileage.year}.</p>
                                                                        <p class="occasion-para">Prix : ${mileage.price} €</p>
                                                                        <a href="occasion-page.php?id=${mileage.car_id}" class="custom-button">Voir l'annonce</a>
                                                                    </div>
                                                                </div>`
    
            })
        }
    }
}

const searchYear = async () => {
    document.getElementById("response").innerHTML = ""
    let year = document.querySelector('#year').value
    console.log(year)
    if(year.length > 3) {
        const req = await fetch(`./lib/filter-year.php?year=${year}`)
        const json = await req.json()
        console.log(json)
        if(json.length > 0) {
            json.forEach((year) => {
                document.getElementById("response").innerHTML += `<div class="section-occasion-card">
                                                                    <img src="<?= $imagePath ?>" alt="<?= $imagePath ?>">
                                                                    <div class="section-occasion__div">
                                                                        <h2 class="title-h2">${year.name}</h2>
                                                                        <p class="occasion-para">Kilométrage : ${year.mileage}.</p>
                                                                        <p class="occasion-para">Année : ${year.year}.</p>
                                                                        <p class="occasion-para">Prix : ${year.price} €</p>
                                                                        <a href="occasion-page.php?id=${year.car_id}" class="custom-button">Voir l'annonce</a>
                                                                    </div>
                                                                </div>`
    
            })
        }
    }
}