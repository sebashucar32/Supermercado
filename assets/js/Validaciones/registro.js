function validarRegistro()
{
    let nombre = document.getElementById("nombre").value;
    let apellidos = document.getElementById("apellidos").value;
    let correo = document.getElementById("correo").value;
    let contrasena = document.getElementById("contrasena").value;
    let fecha = document.getElementById("fecha").value;
    let celular = document.getElementById("celular").value;
    let direccion = document.getElementById("direccion").value;
    let ciudad = document.getElementById("ciudades").value;

    //Expresiones Regulares
    let expresionCorreo = /\w+@\w+\.+[a-z]/;
    let expresionLetras = /^[a-zA-Z ]*$/;
    let errores = Array();

    //Validacion del RadioButton
    let sexo = "";
    let mujer = document.getElementById("mujer");
    let hombre = document.getElementById("hombre");

    if(mujer.checked) {
        sexo = mujer.value;
    } else if(hombre.checked) {
        sexo = hombre.value;
    }

    if(nombre === ""  || apellidos === "" || correo === "" || contrasena === "" || fecha === "" || sexo === "" || celular === "" || direccion === "" || ciudad === "") 
    {   
        errores.push('Todos los campos son obligatorios');
    }

    if(nombre.length > 100) 
    {   
        errores.push('El nombre es muy largo');
    }
    
    if(nombre.search(expresionLetras) || apellidos.search(expresionLetras))   // Si el valor que busca el search no coincide con el patron arrojara valor negativo
    {
        errores.push('Para nombres y apellidos solo se permiten caracteres del alfabeto');
    }
    
    if(apellidos.length > 100) 
    {   
        errores.push('Los apellidos estan muy largos');
    }

    if(correo.length > 255) 
    {   
        errores.push('El correo esta muy largo');
    }

    if(!expresionCorreo.test(correo))
    {   
        errores.push('El correo no es valido');
    }

    if(contrasena.length > 255) 
    {   
        errores.push('La contraseña esta muy larga');
    }

    if(celular.length > 100) 
    {   
        errores.push('Numero de celular muy largo');
    }

    if(direccion.length > 100) 
    {   
        errores.push('La direccion esta muy larga');
    }

    if(sexo === "") 
    {
        errores.push('Debe escoger un valor para el sexo');
    } 

    if(errores.length > 0)
    {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errores,
            footer: '<a href>Por que tengo este problema?</a>'
        }) 
        return false;
    }
    else
    {   
        Swal.fire({
            icon: 'success',
            title: 'Usuario Guardado',
            showConfirmButton: false,
            timer: 8500
        }) 
        return true;
    } 
}