$(document).ready( function () 
    {
      $('#table_cust').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
          "url": "data_licencias.php",
          "type": "POST"
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "columns": [
        { "data": "urutan" },
        { "data": "cod_licencia" },

        { "data": "tipo_licencia" },

        { "data": "nombre_agencia" },

        { "data": "fecha_alta" },
        { "data": "button" },
        ]
      });


    });





    $(document).on("click","#btnadd",function(){
        $("#modalcust").modal("show");
        $("#txtcod_licencia").focus();
        $("#txtcod_licencia").val("");
        $("#txttipo_licencia").val("");
        $("#txtagencia_licencia").val("");
        
        $("#crudmethod").val("N");
        $("#txtid_licencia").val("0");
    });
    $(document).on( "click",".btnhapus", function() {
      var id_licencia = $(this).attr("id_licencia");
      var cod_licencia = $(this).attr("cod_licencia");
      swal({   
        title: "Borrar Licencia?",   
        text: "Borrar licencia : "+cod_licencia+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Delete",   
        closeOnConfirm: true }, 
        function(){   
          var value = {
            id_licencia: id_licencia
          };
          $.ajax(
          {
            url : "delete_licencia.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Licencia borrada correctamente');
                var table = $('#table_cust').DataTable(); 
                table.ajax.reload( null, false );
              }else{
                swal("Error","Can't delete customer data, error : "+data.error,"error");
              }

            },
            error: function(jqXHR, textStatus, errorThrown)
            {
             swal("Error!", textStatus, "error");
            }
          });
        });
    });
    $(document).on("click","#btnsave",function(){
      var id_licencia = $("#txtid_licencia").val();
      var cod_licencia = $("#txtcod_licencia").val();
      var tipo_licencia = $("#txttipo_licencia").val();
      var agencia_licencia = $("#txtagencia_licencia").val();
      var crud=$("#crudmethod").val();
      if(cod_licencia == '' || cod_licencia == null ){
        swal("AVISO","Campo CODIGO es obligatorio","warning");
        $("#txtcod_licencia").focus();
        return;
      }
      if(tipo_licencia == '' || tipo_licencia == null ){
          swal("AVISO","Campo Tipo es obligatorio","warning");
          $("#txttipo_licencia").focus();
          return;
        }
      if(agencia_licencia == '' || agencia_licencia == null ){
          swal("AVISO","Campo Agencia es obligatorio","warning");
          $("#txtagencia_licencia").focus();
          return;
        }
      var value = {
        id_licencia: id_licencia,
        cod_licencia: cod_licencia,
        tipo_licencia:tipo_licencia,
        agencia_licencia:agencia_licencia,
        crud:crud
      };
      $.ajax(
      {
        url : "save_licencia.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          if(data.crud == 'N'){
            if(data.result == 1){
              $.notify('Licencia guardada correctamente');
              var table = $('#table_cust').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtcod_licencia").focus();
              $("#txtcod_licencia").val("");
              $("#txttipo_licencia").val("");
              $("#txtagencia_licencia").val("");
              
              $("#crudmethod").val("N");
              $("#txtid_licencia").val("0");
              $("#txtcod_licencia").focus();
            }else{
              swal("Error","Can't save customer data, error : "+data.error,"error");
            }
          }else if(data.crud == 'E'){
            if(data.result == 1){
              $.notify('Licencia modificada correctamente');
              var table = $('#table_cust').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtcod_licencia").focus();
            }else{
             swal("Error","Can't update customer data, error : "+data.error,"error");
            }
          }else{
            swal("Error","invalid order","error");
          }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
           swal("Error!", textStatus, "error");
        }
      });
    });
    $(document).on("click",".btnedit",function(){
      var id_licencia=$(this).attr("id_licencia");
      var value = {
        id_licencia: id_licencia
      };
      $.ajax(
      {
        url : "get_licencia.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          $("#crudmethod").val("E");
          $("#txtid_licencia").val(data.id_licencia);
          $("#txtcod_licencia").val(data.cod_licencia);
          $("#txttipo_licencia").val(data.tipo_licencia);
          $("#txtagencia_licencia").val(data.agencia_licencia);

          $("#modalcust").modal('show');
          $("#txtcod_licencia").focus();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
          swal("Error!", textStatus, "error");
        }
      });
    });
    $.notifyDefaults({
      type: 'success',
      delay: 500
    });