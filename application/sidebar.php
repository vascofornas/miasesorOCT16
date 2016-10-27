   <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="usuarios/<?php echo $_SESSION['foto']?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p><?php echo $_SESSION['nombre']?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>
              
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">
              <li class="header">SUPER ADMNISTRADOR</li>
                              <li>
                  <a href="usuarios.php">
                    <i class="fa fa-sitemap"></i> <span>Usuarios</span>
                    <small class="label pull-right bg-red"><?php echo contar_usuarios();?></small>
                  </a>
                </li>
                            <li>
                  <a href="licencias.php">
                    <i class="fa fa-sitemap"></i> <span>Licencias</span>
                    <small class="label pull-right bg-red"><?php echo contar_licencias();?></small>
                  </a>
                </li>
                
          
                
                <li>
                  <a href="agencias.php">
                    <i class="fa fa-sitemap"></i> <span>Agencias</span>
                    <small class="label pull-right bg-red"><?php echo contar_agencias();?></small>
                  </a>
                </li>
                    <li class="header">DATOS GENERALES</li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-group"></i> <span>Asesores</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-shield"></i> <span>Aseguradoras</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                <li>
                  <a href="asesores.php">
                    <i class="fa fa-credit-card"></i> <span>Financieras</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                <li>
                  <a href="asesores.php">
                    <i class="fa fa-phone"></i> <span>Auxilio Vial</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                <li>
                  <a href="asesores.php">
                    <i class="fa fa-car"></i> <span>Autos nuevos/seminuevos</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                <li class="header">OPCIONES DE LA APP</li>
                <li class="header">Citas a Servicio</li>
               
                
                  <li>
                  <a href="asesores.php">
                    <i class="fa fa-car"></i> <span>Veh�culos</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-calendar"></i> <span>A�os</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                <li>
                  <a href="asesores.php">
                    <i class="fa fa-tachometer"></i> <span>Kil�metros</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-cubes"></i> <span>Tipos de citas</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                <li class="header">Tr�mites Online</li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-cubes"></i> <span>Tipos de tr�mites</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                <li class="header">Costo de Servicios</li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-car"></i> <span>Veh�culos</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-tachometer"></i> <span>Kil�metros</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-calendar"></i> <span>A�os</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                  <li class="header">DATOS RECIBIDOS</li>
                <li>
                  <a href="asesores.php">
                    <i class="fa fa-calendar"></i> <span>Citas a Servicio</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
              <li>
                  <a href="asesores.php">
                    <i class="fa fa-cubes"></i> <span>Tr�mites online</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                 <li>
                  <a href="asesores.php">
                    <i class="fa fa-money"></i> <span>Costo de Servicios</span>
                    <small class="label pull-right bg-red">3</small>
                  </a>
                </li>
                 
                
                
                   
              </ul>
            </section>
            <!-- /.sidebar -->