/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarElemento',function(e){

  $("#smgElemento").html("");
  var formData = new FormData();
  formData.append("nombre", document.getElementsByName("nombre")[0].value);
  formData.append("precio", document.getElementsByName("precio")[0].value);
  formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
  formData.append("file", $('#file')[0].files[0]);


  var ruta = routesAppPlatform() + 'elementos/core/registrarElemento.php';

  sendEventFormDataApp('POST', ruta, formData, '#smgElemento');
    
     return false;
 });



//  $(document).on('click','#actualizarCambios',function(e){

//   $("#smgElemento").html("");
//   var formData = new FormData();
//   formData.append("nombre", document.getElementsByName("nombre")[0].value);
//   formData.append("precio", document.getElementsByName("precio")[0].value);
//   formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
//   formData.append("file", $('#file')[0].files[0]);


//   var ruta = routesAppPlatform() + 'elementos/core/modificarElemento.php';
  
//   sendEventFormDataApp('POST', ruta, formData, '#smgElemento');

    
//      return false;
//  });