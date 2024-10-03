document.addEventListener("DOMContentLoaded", function() {
const form = document.querySelector('#form-2');
form.addEventListener('submit', function(event){
    event.preventDefault();
    const datosFormulario = new FormData(form);
    const url = form.action;
    fetch(url, {method: 'POST', body: datosFormulario})
        .then(respuesta => respuesta.json())
        .then( datos => { mostrarResultados(datos); })
        .catch( error => {console.log(error);});
});
});

function mostrarResultados(datos)
{
    let respuesta = "<h1>Resultados:</h1><ul>";
    respuesta += "<li>Nombre: " + datos.nombre + "</li></ul>";
    document.querySelector('#posts').innerHTML = respuesta;
}