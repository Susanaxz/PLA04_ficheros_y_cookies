	function validaFormulario() {
		var text="";
		var error=false;

		if($("#nombre").val() == "") {
			//validar nombre informado
			text=("Nombre" + "\n");
			error=true;
		}

		if($("#email").val() == "") {
			//validar email informado
			text=(text + "Email" + "\n");
			error=true;
		} else {
			//validar email correcto
        	if (!/^\w+([\.-]\w+)*@\w+([\.-]\w+)*$/.test($("#email").val())) {
				text=(text + "Por favor, introduzca una dirección de correo válida." + "\n");
				error=true;
			}
		}

		if($("#mensaje").val() == "") {
			text=(text + "Mensaje" + "\n");
			error=true;
		} 

		if (!document.getElementById('privacidad').checked) {
			text=(text + "Es obligatorio aceptar la normativa de privacidad");
			error=true;
		};

		if (error==true) {
			text=("Por favor revise los siguientes datos:\n\n" + text + "\n\n");
		}

		if (error==true) {
			alert(text);
		} else {
			$('#form').submit();
 		}
	}