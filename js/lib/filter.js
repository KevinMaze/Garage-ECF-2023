console.log("je suis actif")

// let xhr = new XMLHttpRequest();

// xhr.open("GET", "./lib/filter.php", true);
// xhr.responseType = "json"
// xhr.onreadystatechange = function() {
//     if(xhr.readyState === 4 && this.status == 200){
//         let result = this.response
//         console.log(result)
//     }else if (this.readyState == 4 && this.status == 404){
//         alert('Erreur 404')
//     }
// };


// xhr.send();

async function callCar(){
    const url = "./lib/filter.php"
    const fetcher = await fetch(url)
    const json = await fetcher.json()
    console.log(json)
}
