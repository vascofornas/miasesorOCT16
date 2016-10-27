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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "columns": [
        { "data": "urutan" },
        { "data": "nombre" },
        { "data": "apellidos" },
        { "data": "nivel_usuario" },
        { "data": "nombre_agencia" },
        { "data": "cargo_usuario" },
        { "data": "licencia_usuario" },
        { "data": "tel" },
        { "data": "button" },
        ]
      });


    });





    $(document).on("click","#btnadd",function(){
        $("#modalcust").modal("show");
        $("#txtnombre").focus();
        $("#txtnombre").val("");
        $("#txtapellidos").val("");
        $("#txtnivel_usuario").val("");
        $("#txtagencia_usuario").val("");
        $("#txtemail").val("");
        $("#txtcargo_usuario").val("");
        $("#txtlicencia_usuario").val("");
        $("#txtverified").val("");
        $("#txttel").val("");
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
                $.notify('Usuario borrado correctamente');
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
      var nivel_usuario = $("#txtnivel_usuario").val();
      var agencia_usuario = $("#txtagencia_usuario").val();
      var cargo_usuario = $("#txtcargo_usuario").val();
      var email = $("#txtemail").val();
      var tel = $("#txttel").val();
      var verified = $("#txtverified").val();
      var licencia_usuario = $("#txtlicencia_usuario").val();
      var crud=$("#crudmethod").val();
      if(nombre == '' || nombre == null ){
        swal("AVISO","Campo Nombre es obligatorio","warning");
        $("#txtnombre").focus();
        return;
      }
      if(apellidos == '' || apellidos == null ){
          swal("AVISO","Campo Apellidos es obligatorio","warning");
          $("#txtapellidos").focus();
          return;
        }
      if(nivel_usuario == '' || nivel_usuario == null ){
          swal("AVISO","Campo Nivel de Usuario es obligatorio","warning");
          $("#txtnivel_usuario").focus();
          return;
        }
      if(agencia_usuario == '' || agencia_usuario == null ){
          swal("AVISO","Campo Agencia del Usuario es obligatorio","warning");
          $("#txtagencia_usuario").focus();
          return;
        }
      if(email == '' || email == null ){
          swal("AVISO","Campo Email es obligatorio","warning");
          $("#txtemail").focus();
          return;
        }
      if(cargo_usuario == '' || cargo_usuario == null ){
          swal("AVISO","Campo Funcion del Usuario es obligatorio","warning");
          $("#txtemail").focus();
          return;
        }
      if(verified == '' || verified == null ){
          swal("AVISO","Campo Email Verificado es obligatorio","warning");
          $("#txtemail").focus();
          return;
        }
      var value = {
        id: id,
        nombre: nombre,
        apellidos:apellidos,
        nivel_usuario:nivel_usuario,
        agencia_usuario:agencia_usuario,
        email:email,
        tel:tel,
        cargo_usuario:cargo_usuario,
        licencia_usuario:licencia_usuario,
        verified:verified,
        
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
              $.notify('Usuario guardado correctamente');
              var table = $('#table_cust').DataTable(); 
              table.ajax.reload( null, false );
              $("#txtnombre").focus();
              $("#txtnombre").val("");
              $("#txtapellidos").val("");
              $("#txtnivel_usuario").val("");
              $("#txtagencia_usuario").val("");
              $("#txtemail").val("");
              $("#txtcargo_usuario").val("");
              $("#txtlicencia_usuario").val("");
              $("#txtverified").val("");
              $("#txttel").val("");
              
              $("#crudmethod").val("N");
              $("#txtid").val("0");
              $("#txtnombre").focus();
            }else{
              swal("Error","Can't save customer data, error : "+data.error,"error");
            }
          }else if(data.crud == 'E'){
            if(data.result == 1){
              $.notify('Usuario modificado correctamente');
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
          $("#txtnivel_usuario").val(data.nivel_usuario);

          $("#txtagencia_usuario").val(data.agencia_usuario);
          $("#txtcargo_usuario").val(data.cargo_usuario);
          $("#txtlicencia_usuario").val(data.licencia_usuario);
          $("#txtemail").val(data.email);
          $("#txttel").val(data.tel);
          $("#txtverified").val(data.verified);

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