/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarBlog',function(e){
  $("#smgElemento").html("");
  var formData = new FormData();
  formData.append("idusuario", document.getElementsByName("idusuario")[0].value);
  formData.append("titulo", document.getElementsByName("titulo")[0].value);
  formData.append("subtitulo", document.getElementsByName("subtitulo")[0].value);
  formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
  formData.append("textarea1", document.getElementsByName("textarea1")[0].value);
  formData.append("file1", $('#file1')[0].files[0]);
  formData.append("file2", $('#file2')[0].files[0]);
  formData.append("file3", $('#file3')[0].files[0]);
  var ruta = routesAppPlatform() + 'blog/core/registrarBlog.php';
  sendEventFormDataApp('POST', ruta, formData, '#smgElemento');
    
     return false;
 });
 /*  Eventos para modulo de sesion. */
$(document).on('click','#modificarBlog',function(e){
  $("#smgElemento").html("");
  var formData = new FormData();
  formData.append("nombre", document.getElementsByName("nombre")[0].value);
  formData.append("precio", document.getElementsByName("precio")[0].value);
  formData.append("textarea1", document.getElementsByName("textarea1")[0].value);
  formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
  formData.append("idblog", document.getElementsByName("idblog")[0].value);
  formData.append("idusuario", document.getElementsByName("idusuario")[0].value);
  formData.append("file1", $('#file1')[0].files[0]);
  formData.append("file2", $('#file2')[0].files[0]);
  formData.append("file3", $('#file3')[0].files[0]);
  var ruta = routesAppPlatform() + 'blog/core/modificarBlog.php';
  sendEventFormDataApp('POST', ruta, formData, '#smgElemento');
    
     return false;
 });
