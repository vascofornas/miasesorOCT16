<?php require "login/loginheader.php"; 
include 'funciones.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="ISO-8859-1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agencias</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- SweetAlert  style -->
    <link rel="stylesheet" href="../../plugins/sweetalert/sweetalert.css">

    <!-- responsive datatables -->
     <link rel="stylesheet" href="../../plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <!-- SweetAlert -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap-notify -->
    <script src="../../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    
    <script src="agencias.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

          <header class="main-header">
           <?php include '../header.php';?>
          </header>

          <!-- =============================================== -->

          <!-- Left side column. contains the sidebar -->
          <aside class="main-sidebar">
         <?php include '../sidebar.php';?>
          </aside>

          <!-- =============================================== -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <IMG SRC="login/logoappauto.png" WIDTH=80 HEIGHT=80 align="center">
            <h1>AGENCIAS / <?php 
                    echo get_agencia($_SESSION['agencia'])?></h1>
              <h1>
                
                <small>Mi Asesor Automotriz  </small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Portada</a></li>
             >
              </ol>
            </section>

            <!-- ========================================================================================================== -->
            <!-- Main content -->
            <section class="content">
              <!-- Default box -->
              <div class="box">
                <div class="box-body">
                 <button type="submit" class="btn btn-primary " id="btnadd" name="btnadd"><i class="fa fa-plus"></i> Nueva Agencia</button>
                 <br>
                 <br>
                 <div class="box-body" style="max-width:900px;" >
                  <table id="table_cust" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr class="tableheader">
                        <th style="width:40px">#</th>
                        <th style="width:140px">Codigo</th>
                        <th style="width:400px">Nombre</th>
                        
                 
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div id="modalcust" class="modal">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">X</button>
                      <h4 class="modal-title">Formulario Agencias</h4>
                    </div>
                    <!--modal header-->
                    <div class="modal-body">
                      <div class="pad" id="infopanel"></div>
                      <div class="form-horizontal">
                        <div class="form-group"> 
                          <label class="col-sm-3  control-label">Codigo</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtcodigo_agencia" placeholder="Codigo">
                              <input type="hidden" id="crudmethod" value="N"> 
                              <input type="hidden" id="txtid_agencia" value="0">
                            </div>
                        </div>
                     <div class="form-group"> 
                          <label class="col-sm-3  control-label">Nombre</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtnombre_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                        <div class="form-group"> 
                          <label class="col-sm-3  control-label">Direccion</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                        
                           <div class="form-group"> 
                          <label class="col-sm-3  control-label">Google Play</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                           <div class="form-group"> 
                          <label class="col-sm-3  control-label">Apple App Store</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                           <div class="form-group"> 
                          <label class="col-sm-3  control-label">Web Autos Nuevos</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                           <div class="form-group"> 
                          <label class="col-sm-3  control-label">Auxilio Vial MEXICO</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                           <div class="form-group"> 
                          <label class="col-sm-3  control-label">Auxilio Vial USA</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                         <div class="form-group"> 
                          <label class="col-sm-3  control-label">INBURSA</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                         <div class="form-group"> 
                          <label class="col-sm-3  control-label">GNP</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                         <div class="form-group"> 
                          <label class="col-sm-3  control-label">ASSISTANCE</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                         <div class="form-group"> 
                          <label class="col-sm-3  control-label">MAPFRE</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                         <div class="form-group"> 
                          <label class="col-sm-3  control-label">QUALITAS</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                         <div class="form-group"> 
                          <label class="col-sm-3  control-label">ATLAS</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtdireccion_agencia" placeholder="Nombre">
                             
                            </div>
                        </div>
                                               <div class="form-group"> 
                          <label class="col-sm-3  control-label"></label>
                          
                          <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary " id="btnsave"><i class="fa fa-save"></i> Guardar</button></div>
                        </div>
                      </div>
                      <!--modal footer-->
                    </div>
                    <!--modal-content-->
                  </div>
                  <!--modal-dialog modal-lg-->
                </div>
                <!--form-kantor-modal-->
              </div>


            </section><!-- /.content -->

            <!-- ========================================================================================================== -->

          </div><!-- /.content-wrapper -->

<?php include '../footer.php';?>
       