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
    if(datos.tipo == "post"){
        for (let i = 0; i <= datos.post.length; i++){
            let response = "<p>" + datos.post[i] + "</p>";
            document.querySelector('#posts').innerHTML += response;
        }
    }else{
        if(datos.nombre == "Erroror en los datos"){
            document.querySelector('#error').innerHTML = "<p>" + datos.nombre + "</p>";
        }
        else if(datos.tipo == "Admin"){
            document.querySelector('#content').style.display = "block";
            document.querySelector('#inicioSecion').style.display = "none";
            let respuesta = "<p>" + datos.nombre + "</p>";
            
            document.querySelector('#posts').innerHTML = "<div>" + datos.posteo + 
            "<button>hola</button>"
            "</div>";
            document.querySelector('#username').innerHTML = respuesta;
        }
        else{
            document.querySelector('#content').style.display = "block";
            document.querySelector('#inicioSecion').style.display = "none";
            let respuesta = "<p>" + datos.nombre + "</p>";
            let respuesta2 = "<h1> Posts </h1>";
            for(let i=0 ; i < datos.posteo.length; i++){
                respuesta2 += "<p>" + datos.posteo[i].contenido + "</p>"
            }
            document.querySelector('#posts').innerHTML = respuesta2;
            console.log(datos.posteo);
            document.querySelector('#username').innerHTML = respuesta;
        }
    }
}