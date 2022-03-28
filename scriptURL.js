
const scriptURL = '<SCRIPT URL>' //URL script generada por Google Sheets
const form = document.forms['my-google-sheet'] //Nombre del formulario

form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
    .then(response => console.log('Success!', response))
    .catch(error => console.error('Error!', error.message))
})