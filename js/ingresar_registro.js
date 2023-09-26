$(document).ready(function () {

	var id_user = sessionStorage.getItem("user_id");

	var myHeaders = new Headers();
	myHeaders.append("DOLAPIKEY", "8Eb3PKvNYj7qzjt35AUcLieQt06620KG");

	var requestOptions = {
	method: 'GET',
	headers: myHeaders,
	redirect: 'follow'
	};

	fetch(`http://localhost/dolibarr/api/index.php/users/${id_user}` , requestOptions)
	.then(response => response.json())  // Parse la respuesta JSON
	.then(data => {
		// Accede al campo "login" en los datos
		const login = data.login;
		const id = data.id;
		$("#login").val(login);
		$("#id_login").val(id);
	})
	.catch(error => console.error('Error:', error));



	$('#btn_ingresar').click(function () {
	
			if
				($('#nombres').val() == '' ||
				$('#nombre_compania').val() == '' ||
				$('#apellidos').val() == '' ||
				$('#dni').val() == '' ||
				$('#servicio_icontec').val() == '' ||
				$('#opcion_gestion').val() == '' ||
				$('#tipo_icontec').val() == '' ||
				$('#tipo_solicitud').val() == '' ||
				$('#estados').val() == '' ||
				$('#clase_contacto').val() == '' ||
				$('#phone').val() == '' ||
				$('#regional').val() == '' ) {
	
				Swal.fire({
					icon: 'error',
					title: 'FALTA ALGO',
					position: 'top',
					allowOutsideClick: false,
					text: 'RELLENE TODOS LOS CAMPOS'
				})
	
				return false;
	
			} else if ($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
	
				Swal.fire({
					icon: 'error',
					position: 'top',
					allowOutsideClick: false,
					title: 'CAMPO CORREO ELECTRÓNICO',
					text: 'NO ES CORRECTO O VALIDO'
				})
	
				return false;				
	
			} else {

				
				$('#btn_ingresar').attr("disabled", true);
	
				var datos 		= $('#frmingresar').serialize();
	
				$.ajax({
					type: "POST",
					url: "includes/procesa_ingresar_registro.php",
					data: {datos,login},
	
					success: function (a) {
		
						console.log(a);
		
						if (a == 1) {
	
							Swal.fire({
								title: 'AVISO',
								position: 'top',
								allowOutsideClick: false,
								text: "Registro Ingresado Correctamente",
								icon: 'success'									
							}).then((result) => {
								if (result.isConfirmed) {
	
									$('#frmingresar').trigger('reset');
									$('#btn_ingresar').attr("disabled", false);
	
								}
	
							})
	
							return false;
	
						} else {
	
							Swal.fire({
								icon: 'error',
								position: 'top',
								allowOutsideClick: false,
								title: 'Registro no Ingresado',
								text: 'Verifique algun caracter no valido en los campos'
							})
	
							return false;
	
						}
	
					}
				});
	
				return false;
			}
	
	
	});
	
	});