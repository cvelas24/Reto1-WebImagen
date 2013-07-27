//Archivos
var fotosInicio = "php/inicio.php";
var errores = 0;

$(document).ready(function(){
    //cargarFotosInicio();
})

function validarImg(){
	errores = 0;
	var ruta = document.getElementById('imagen').value;
	var ext = ruta.substring(ruta.lastIndexOf('.') + 1);
	ruta = ruta.substring(ruta.lastIndexOf("\\") + 1);
	ext.toLowerCase();
	if(ext == "gif" || ext == "jpeg" || ext == "jpg" ||  
		ext == "png" || ext == "bmp")
	{
		if ($("#imagen")[0].files[0].size < 2000000){
			//Se va a verificar si existe la imagen en la db
			var mensaje = 'instr=validarImg&' + 
			$("#formImg").serialize() +'&ruta='+ ruta;
			$.ajax({
				async: false,
			    url: "../php/validaciones.php",
			    type: "POST",
			    data: mensaje,
			    success: function(datos){
			        if(datos > 0){
			        	alert("La imagen ya existe en este album");
			        	errores++;
			        }
			    },
			    error: function(jqXHR){
			        alert(jqXHR.responseText);
			        sumarError();
			    }
			});
			if(errores) 
				return false;
			else
				return true;
		}else{
			alert("Imagen excede los 2MB permitidos");
			return false;
		}
	} 
	else
	{
		alert("Seleccione un archivo de imagen valido");
		return false;
	}
}

function validarAlbum(){
	errores = 0;
	var album = document.getElementById('album').value;
	if(album != ""){
		$("#obligatorio").remove();
		//Se va a verificar si existe el album en la db
		var mensaje = 'instr=validarAlbum&' + 
			$("#formAlbum").serialize();
		$.ajax({
			async: false,
		    url: "../php/validaciones.php",
		    type: "POST",
		    data: mensaje,
		    //dataType: "json",
		    success: function(datos){
		        if(datos > 0){
		        	alert("Ya tienes un album con ese nombre");
		        	errores++;
		        }
		    },
		    error: function(jqXHR){
		        alert(jqXHR.responseText);
		        sumarError();
		    }
		});
		if(errores) 
			return false;
		else
			return true;
	}else{
		$("#obligatorio").remove();
		$("#errorAlbum").append("<span id='obligatorio'>*</span>");
		return false;
	}
}