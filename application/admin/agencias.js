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
          "url": "data_agencias.php",
          "type": "POST"
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "columns": [
        { "data": "urutan" },
        { "data": "codigo_agencia" },

        { "data": "nombre_agencia" },

       
        { "data": "button" },
        ]
      });


    });





    $(document).on("click","#btnadd",function(){
        $("#modalcust").modal("show");
        $("#txtcodigo_agencia").focus();
        $("#txtcodigo_agencia").val("");
        $("#txtnombre_agencia").val("");
       
        
        $("#crudmethod").val("N");
        $("#txtid_licencia").val("0");
    });
    $(document).on( "click",".btnhapus", function() {
      var id_agencia = $(this).attr("id_agencia");
      var codigo_agencia = $(this).attr("codigo_agencia");
      swal({   
        title: "Borrar Agencia?",   
        text: "Borrar agencia : "+codigo_agencia+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Delete",   
        closeOnConfirm: true }, 
        function(){   
          var value = {
            id_agencia: id_agencia
          };
          $.ajax(
          {
            url : "delete_agencia.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Agencia borrada correctamente');
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
      var id_agencia = $("#txtid_agencia").val();
      var codigo_agencia = $("#txtcodigo_agencia").val();
      var nombre_agencia= $("#txtnombre_agencia").val();
    
      var crud=$("#crudmethod").val();
      if(codigo_agencia == '' || codigo_agencia == null ){
        swal("AVISO","Campo CODIGO es obligatorio","warning");
        $("#txtcodigo_agencia").focus();
        return;
      }
      if(nombre_agencia == '' || nombre_agencia == null ){
          swal("AVISO","Campo Nombre es obligatorio","warning");
          $("#txtnombre_agencia").focus();
          return;
        }
    
      var value = {
        id_agencia: id_agencia,
        codigo_agencia: codigo_agencia,
        nombre_agencia: nombre_agencia,
        crud:crud
      };
      $.ajax(
      {
        url : "save_agencia.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          if(data.crud == 'N'){
            if(data.result == 1){
              $.notify('Agencia guardada correctamente');
              var table = $('#table_cust').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtcodigo_agencia").focus();
              $("#txtcodigo_agencia").val("");
              $("#txtnombre_agencia").val("");
              
              
              $("#crudmethod").val("N");
              $("#txtid_licencia").val("0");
              $("#txtcodigo_licencia").focus();
            }else{
              swal("Error","Can't save customer data, error : "+data.error,"error");
            }
          }else if(data.crud == 'E'){
            if(data.result == 1){
              $.notify('Agencia modificada correctamente');
              var table = $('#table_cust').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtcodigo_agencia").focus();
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
      var id_agencia=$(this).attr("id_agencia");
      var value = {
        id_agencia: id_agencia
      };
      $.ajax(
      {
        url : "get_agencia.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          $("#crudmethod").val("E");
          $("#txtid_agencia").val(data.id_agencia);
          $("#txtcodigo_agencia").val(data.codigo_agencia);
          $("#txtnombre_agencia").val(data.nombre_agencia);
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