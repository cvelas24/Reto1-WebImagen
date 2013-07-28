//Variables globales
var error = 0;

$(document).ready(function(){
    //cargarFotosInicio();
})

//Funciones de validacion

function validarReg(){
	error = 0;
	$(".obligatorio").remove();
	//Verificar campos en blanco
	var enBlanco = 0;
	var campos = $(".requerido").find(
		"select, textarea, input").serializeArray();
	$.each(campos, function(i, field) {
		if (!field.value){
			var oblig = "<span class='obligatorio'>*</span>";
			$("#"+"error"+field.name).append(oblig);
			enBlanco++;
		}
	})
	var pwd = document.getElementById('pwd').value;
	var repwd = document.getElementById('repwd').value;
	if(enBlanco == 0){
		//Verificar contraseña
		if(pwd == repwd){
			//Se va a verificar si existe el usuario en la db
			var mensaje = 'instr=validarReg&' + 
				$("#formReg").serialize();
			$.ajax({
				async: false,
			    url: "../php/validaciones.php",
			    type: "POST",
			    data: mensaje,
			    success: function(datos){
			        if(datos > 0){
			        	$("#errormsgreg").append(
			        		"<span class='obligatorio'>" +
			        		"Ya existe ese usuario, prueba" +
			        		" con otro diferente</span>"
			        	);
			        	error++;
			        }
			    },
			    error: function(jqXHR){
			        alert(jqXHR.responseText);
			    }
			});
			if(error) return false;
			else return true;
		}else{
			alert("Las contraseñas no coinciden");
			return false;
		}
	}else{
		return false;
	}
}

function validarInicio(){
	error = 0;
	$(".obligatorio").remove();
	//Verificar campos en blanco
	var login = document.getElementById('login').value;
	var pwd = document.getElementById('pwd').value;
	if(login != "" && pwd != ""){
		return true;
	}else{
		var oblig = "<span class='obligatorio'>*</span>";
		if(login == "")
			$("#errorinilogin").append(oblig);
		if(pwd == "")
			$("#errorinipwd").append(oblig);
		return false;
	}
}

function validarImg(){
	error = 0;
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
			        	error++;
			        }
			    },
			    error: function(jqXHR){
			        alert(jqXHR.responseText);
			    }
			});
			if(error) 
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
	error = 0;
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
		    success: function(datos){
		        if(datos > 0){
		        	alert("Ya tienes un album con ese nombre");
		        	error++;
		        }
		    },
		    error: function(jqXHR){
		        alert(jqXHR.responseText);
		    }
		});
		if(error) 
			return false;
		else
			return true;
	}else{
		$("#obligatorio").remove();
		$("#errorAlbum").append("<span id='obligatorio'>*</span>");
		return false;
	}
}