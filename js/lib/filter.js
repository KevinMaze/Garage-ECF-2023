console.log("je suis actif")

let xhr = new XMLHttpRequest();
xhr.open("GET", "./lib/pdo.php");
xhr.onreadystatechange = function() {
    if(xhr.readyState === 4){
        alert(xhr.responseText);
    }
};
xhr.send();