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
          "url": "data_usuarios.php",
          "type": "POST"
        },
        "columns": [
        { "data": "urutan" },
        { "data": "nombre" },
        { "data": "apellidos" },
        
        { "data": "button" },
        ]
      });


    });
    $(document).on("click","#btnadd",function(){
        $("#modalcust").modal("show");
        $("#txtnombre").focus();
        $("#txtnombre").val("");
        $("#txtapellidos").val("");
        $("#crudmethod").val("N");
        $("#txtid").val("0");
    });
    $(document).on( "click",".btnhapus", function() {
      var id = $(this).attr("id");
      var nombre = $(this).attr("nombre");
      swal({   
        title: "Borrar Usuario?",   
        text: "Borrar usuario : "+nombre+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Delete",   
        closeOnConfirm: true }, 
        function(){   
          var value = {
            id: id
          };
          $.ajax(
          {
            url : "delete_usuario.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Successfull delete customer');
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
      var id = $("#txtid").val();
      var nombre = $("#txtnombre").val();
      var apellidos = $("#txtapellidos").val();
      var crud=$("#crudmethod").val();
      if(nombre == '' || nombre == null ){
        swal("Warning","Please fill customer name","warning");
        $("#txtnombre").focus();
        return;
      }
      var value = {
        id: id,
        nombre: nombre,
        apellidos:apellidos,
        crud:crud
      };
      $.ajax(
      {
        url : "save_usuario.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          if(data.crud == 'N'){
            if(data.result == 1){
              $.notify('Successfull save data');
              var table = $('#table_cust').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtnombre").focus();
              $("#txtnombre").val("");
              $("#txtapellidos").val("");
              $("#crudmethod").val("N");
              $("#txtid").val("0");
              $("#txtnombre").focus();
            }else{
              swal("Error","Can't save customer data, error : "+data.error,"error");
            }
          }else if(data.crud == 'E'){
            if(data.result == 1){
              $.notify('Successfull update data');
              var table = $('#table_cust').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtnombre").focus();
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
      var id=$(this).attr("id");
      var value = {
        id: id
      };
      $.ajax(
      {
        url : "get_usuario.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);
          $("#crudmethod").val("E");
          $("#txtid").val(data.id);
          $("#txtnombre").val(data.nombre);
          $("#txtapellidos").val(data.apellidos);
          

          $("#modalcust").modal('show');
          $("#txtnombre").focus();
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