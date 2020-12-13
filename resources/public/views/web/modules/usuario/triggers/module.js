$(document).on('click','#validarSesion',function(e){
    
    sendEventApp('POST',routesAppWeb()+'usuario/core/validarSesion.php',
      params = {
        "usuario" : document.getElementsByName("usuario")[0].value,
        "clave" : document.getElementsByName("clave")[0].value

       },'#smg_sesion');
       return false;
  });
  
  $(document).on('click','#registrarse',function(e){
  //alert(routesAppWeb()+'usuario/core/registrarUsuario.php');
    sendEventApp('POST',routesAppWeb()+'usuario/core/registrarUsuario.php',
      params = {
        "nombre" : document.getElementsByName("nombre")[0].value,
        "apellido" : document.getElementsByName("apellido")[0].value,
        "telefono" : document.getElementsByName("telefono")[0].value,
        "email" : document.getElementsByName("email")[0].value,
        "usuario" : document.getElementsByName("usuario")[0].value,
        "clave" : document.getElementsByName("clave")[0].value


       },'#smg_registrar');
       return false;
  });
  $(document).on('click','#modificarUsuario',function(e){
    //alert(routesAppWeb()+'usuario/core/registrarUsuario.php');
      sendEventApp('POST',routesAppWeb()+'usuario/core/modificarUsuario.php',
        params = {
          "idusuario" : document.getElementsByName("idusuario")[0].value,
          "nombre" : document.getElementsByName("nombre")[0].value,
          "apellido" : document.getElementsByName("apellido")[0].value,
          "telefono" : document.getElementsByName("telefono")[0].value,
          "email" : document.getElementsByName("email")[0].value,
          "usuario" : document.getElementsByName("usuario")[0].value,
          "clave" : document.getElementsByName("clave")[0].value,
          "informacion" : document.getElementsByName("informacion")[0].value

  
         },'#smg_registrar');
         return false;
    });