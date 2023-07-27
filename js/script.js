let resetBtn = document.querySelector('#btnReset')

const reset = () => {

  document.querySelector('#price-select').selectedIndex = selected
}
resetBtn.addEventListener('click', reset())
