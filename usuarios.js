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
    if(datos.nombre == "Erroror en los datos"){
        document.querySelector('#error').innerHTML = "<p>" + datos.nombre + "</p>";
    }
    else{
        document.querySelector('#content').style.display = "block";
        document.querySelector('#inicioSecion').style.display = "none";
        let respuesta = "<p>" + datos.nombre + "</p>";
        document.querySelector('#username').innerHTML = respuesta;
    }
}