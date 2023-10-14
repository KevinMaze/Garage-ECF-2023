
function countDown(){
    let couldown = document.querySelector(".couldown");
    let seconde = 4;
    let timer = setInterval(function(){
        seconde--;
        if(seconde < 0){
            clearInterval(timer);
        }else{
            couldown.innerHTML = seconde;
        }
    }, 1000); 
}

countDown();