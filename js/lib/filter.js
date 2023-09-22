
const xhr = new XMLHttpRequest();
const verb = 'GET';
const route = './lib/filter.php';
let result;

xhr.open(verb, route, true);

xhr.addEventListener('readystatechange', function() {
    xhr.onload = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            result = xhr.responseText
            // console.log(result)

        }
    }
})

xhr.send()
