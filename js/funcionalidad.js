//Archivos
var fotosInicio = "php/inicio.php";

$(document).ready(function(){
    //cargarFotosInicio();
})

function validarImg()
{
	var imagen = document.getElementById('imagen');
	var ruta = imagen.value;
	var ext = ruta.substring(ruta.lastIndexOf('.') + 1);
	ext.toLowerCase();
	if(ext == "gif" || ext == "jpeg" || ext == "jpg" ||  
		ext == "png" || ext == "bmp")
	{
		if ($("#imagen")[0].files[0].size < 1000000){
			return true;
		}else{
			alert("La imagen es muy grande");
			imagen.focus();
			return false;
		}
		// $.ajax({
	 //        url: "php/validar.php",
	 //        type: "POST",
	 //        data: "",
	 //        dataType: "json",
	 //        success: function(datos){
	 //            alert("suceso");
	 //        },
	 //        error: function(jqXHR){
	 //            alert('Error');
	 //        }
  //       });
	} 
	else
	{
		alert("Seleccione un archivo de imagen valido");
		imagen.focus();
		return false;
	}
}

// function cargarFotosInicio(){
//     $.ajax({
//         url: fotosInicio,
//         type: "GET",
//         data: "",
//         dataType: "json",
//         success: function(datos){
//             for(var i = 0; i <datos.length; i++){
//                 var ruta = datos[i].ruta;
//                 var descripcion = datos[i].descripcion;
//                 $("#fotosInicio").append("<form action=" +
//                     "'php/visualizar.php' method='post'" + 
//                     "enctype='multipart/form-data'>" +
//                     "<input type='image' src = '" + ruta + 
//                     "' height='150'>" +
//                     "<input type='hidden' name='ruta'" +
//                     "value='" + ruta + "'></form>"
//                 );
//             }
//         },
//         error: function(jqXHR){
//             alert('Error');
//         }
//     });
// }