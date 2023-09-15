$(document).ready(function () {


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
					data: datos,
	
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