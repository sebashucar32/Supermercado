function validarLogin()
{
    let correo = document.getElementById("correo").value;
    let contrasena = document.getElementById("contrasena").value;

    //Expresiones Regulares
    let expresionCorreo = /\w+@\w+\.+[a-z]/;
    let errores = Array();

    if(correo === "" || contrasena === "") 
    {   
        errores.push('Todos los campos son obligatorios');
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
        return true;
    } 
}