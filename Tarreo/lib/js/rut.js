/*
	Las funciones del LOGIN se separan del 'global.js' ya que este ultimo
	contiene funciones que denotan las reglas del negocio.
 */
function verificarCamposVaciosLogin() {
	var formLogin = document.getElementById("login");	
	formLogin.j_username.value = formLogin.j_username.value.toUpperCase();
	var usuario = formLogin.j_username.value;
	while (usuario.indexOf(".") != -1) {
		usuario = usuario.replace(".", "");
	}
	usuario = usuario.replace("-", "");
	/*document.getElementById("login").j_username.value=usuario;*/
	//var clave = formLogin.j_password.value;
	var rut = usuario.substring(0, usuario.length - 1);
	var digitoVerificador = usuario.substring(usuario.length - 1, usuario.length);
	
	for (i = 0; i < rut.length; i++){
		if (!((rut.charAt(i) >= "0") && (rut.charAt(i) <= "9"))){
                    toastr.error("El valor ingresado no corresponde a un RUT.", "Rut Incorrecto!!!")
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                }
     		//alert("El valor ingresado no corresponde a un RUT v\u00e1lido");
		//document.getElementById("msjAlerts").innerHTML="El valor ingresado no corresponde a un RUT v\u00e1lido";
		//mostrarPopUpAlerts();
    		return false;
     	 }     	  
  	} 	
	if(rut>50000000){
                toastr.error("El valor ingresado no corresponde a un RUT.", "Rut Incorrecto!!!")
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                }
		//alert("El valor ingresado no corresponde a un RUT v\u00e1lido");
		//document.getElementById("msjAlerts").innerHTML="El valor ingresado no corresponde a un RUT v\u00e1lido";
		//mostrarPopUpAlerts();
		return false;
	}	
	if (usuario == "" ) {
                toastr.error("Debe ingresar un Rut.", "Ingrese los datos pedidos!!!")
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                }
		//alert("Debe ingresar un RUT y una Clave para poder ingresar");
		//document.getElementById("msjAlerts").innerHTML="Debe ingresar un RUT y una Clave para poder ingresar";
		//mostrarPopUpAlerts();
		return false;
	} else if (usuario == "") {
		    toastr.error("", "Ingrese Rut!!!")
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                }
		//document.getElementById("msjAlerts").innerHTML="Ingrese RUT";
		//mostrarPopUpAlerts();
		return false;
	}  else if (digitoVerificador != calcularDigitoVerificadorRUT(rut)) {
		    toastr.error("El valor ingresado no verificable a un RUT.", "Rut Incorrecto!!!")
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "show",
                    "hideMethod": "fadeOut"
                }
		//document.getElementById("msjAlerts").innerHTML="Ingrese un RUT v\u00e1lido";
		//mostrarPopUpAlerts();
		return false;
	} else {
		var errorDiv = document.getElementById("errorDiv");
		if (errorDiv) {
			errorDiv.style.display = "none";
		}
		$j.blockUI({
			message : $j("#modalProcesando")
		});
	}
}

function tecladoVirtual(input) {
	if (document.getElementById("tecladoVirtualCheck").checked) {
		changeDivTeclado(input, "tecladoVirtualCheck", -160, 110);
	} else {
		cerrarTeclado();
	}
}

function calcularDigitoVerificadorRUT(strRutSinDv) {
	var lengthRut = strRutSinDv.length;
	var lngSumaTotal = calculaSumaRut(strRutSinDv, lengthRut);
	/* var intRestoSumaTotal = 11 - (lngSumaTotal mod 11); */
	var intRestoSumaTotal = 11 - (lngSumaTotal % 11);
	var strDVCalculado;

	switch (intRestoSumaTotal) {
	case 10: {
		strDVCalculado = "K";
		break
	}
	case 11: {
		strDVCalculado = "0";
		break
	}
	default: {
		strDVCalculado = "" + intRestoSumaTotal;
		break
	}
	}
	return strDVCalculado;
}

function calculaSumaRut(strRut, lngRut) {
	var sumaRut;
	if (lngRut == 0) {
		sumaRut = 0;
	} else {
		var i = strRut.length - lngRut + 2;
		if (i >= 8) {
			i = i - 6;
		}
		var a = strRut.substr(lngRut - 1, 1);
		var lngSumParcial = a * i;
		sumaRut = lngSumParcial + calculaSumaRut(strRut, lngRut - 1);
	}
	return sumaRut;
}

function formatoRut() {
	var formLogin = document.getElementById("login");
	var sRut1 = formLogin.j_username.value.toUpperCase();
	sRut1=quitarEspacios(sRut1);
	// var sRut1 = rut.value;
	// contador de para saber cuando insertar el . o la -
	var nPos = 0;

	// Guarda el rut invertido con los puntos y el gui�n agregado
	var sInvertido = "";

	// Guarda el resultado final del rut como debe ser
	var sRut = "";
	while (sRut1.indexOf(".") != -1) {
		sRut1 = sRut1.replace(".", "");
	}
	sRut1 = sRut1.replace("-", "");
	
	for ( var i = sRut1.length - 1; i >= 0; i--) {
		sInvertido += sRut1.charAt(i);
		if (i == sRut1.length - 1)
			sInvertido += "-";
		else if (nPos == 3) {
			sInvertido += ".";
			nPos = 0;
		}
		nPos++;
	}

	for ( var j = sInvertido.length - 1; j >= 0; j--) {
		if (sInvertido.charAt(sInvertido.length - 1) != ".")
			sRut += sInvertido.charAt(j);
		else if (j != sInvertido.length - 1)
			sRut += sInvertido.charAt(j);

	}
	// Pasamos al campo el valor formateado
	// rut.value = sRut.toUpperCase();
	document.getElementById("login").j_username.value = sRut.toUpperCase();

}

function quitarEspacios(rut) {
	var i=0;
	while (rut.length>i){
		if((rut.substring(i, i+1)==" ")||(rut.codePointAt(i)==173)){
			rut = rut.substring(0, i) + rut.substring(i+1, rut.length);
		}else{
			i=i+1;
		}
	}
	return rut;
}


if (!String.prototype.codePointAt) {
	(function() {
		'use strict'; // needed to support `apply`/`call` with `undefined`/`null`
		var defineProperty = (function() {
			// IE 8 only supports `Object.defineProperty` on DOM elements
			try {
				var object = {};
				var $defineProperty = Object.defineProperty;
				var result = $defineProperty(object, object, object) && $defineProperty;
			} catch(error) {}
			return result;
		}());
		var codePointAt = function(position) {
			if (this == null) {
				throw TypeError();
			}
			var string = String(this);
			var size = string.length;
			// `ToInteger`
			var index = position ? Number(position) : 0;
			if (index != index) { // better `isNaN`
				index = 0;
			}
			// Account for out-of-bounds indices:
			if (index < 0 || index >= size) {
				return undefined;
			}
			// Get the first code unit
			var first = string.charCodeAt(index);
			var second;
			if ( // check if it�s the start of a surrogate pair
				first >= 0xD800 && first <= 0xDBFF && // high surrogate
				size > index + 1 // there is a next code unit
			) {
				second = string.charCodeAt(index + 1);
				if (second >= 0xDC00 && second <= 0xDFFF) { // low surrogate
					return (first - 0xD800) * 0x400 + second - 0xDC00 + 0x10000;
				}
			}
			return first;
		};
		if (defineProperty) {
			defineProperty(String.prototype, 'codePointAt', {
				'value': codePointAt,
				'configurable': true,
				'writable': true
			});
		} else {
			String.prototype.codePointAt = codePointAt;
		}
	}());
}

function rut(value){
	var sRut1 = value;
	while (sRut1.indexOf(".") != -1) {
		sRut1 = sRut1.replace(".", "");
	}
	sRut1 = sRut1.replace("-", "");
	if(sRut1.length>9){
		jQuery('#username').replaceSelection("", true);
	}else{
		var str=value.substring(value.length-1, value.length);	
		if(str!="0" && str!="1" &&  str!="2" && str!="3" && str!="4" && str!="5" &&
				str!="6" && str!="7" && str!="8" && str!="9" && str!="K" && str!="k"){
			jQuery('#username').replaceSelection("", true);
		}
	}
	
}

function esRutLogin(evt){
	var charCode = getCharCode(evt);	
	if(charCode==0 || largo(evt)){
		return esRUT(evt);
	}
	return false;
}

function largo(evt){
	var formLogin = document.getElementById("login");
	var sRut1 = formLogin.j_username.value.toUpperCase();
	while (sRut1.indexOf(".") != -1) {
		sRut1 = sRut1.replace(".", "");
	}
	sRut1 = sRut1.replace("-", "");
	if(sRut1.length<9){
		return true;	
	}
	return false;	
}
