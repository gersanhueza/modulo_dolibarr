$(document).ready(function() {
    
      var opcion;
      opcion = 1;
  
      var tablero_rellamada = $('#tablero_rellamada').DataTable({
      "order": [[ 2, "desc" ]],
        "pageLength": 10,
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},  
      "ajax":{            
          "url": "includes/procesa_ver.php", 
          "method": 'POST',
          "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
          "dataSrc":""
      },
      "columns":[
          {"data": "session_id"},
          {"data": "pcs"},
          {"data": "fecha_hora_ingreso"},
          {"data": "nombre_cliente"}
      ],

  }); 
  
  
  
  
  });