<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="ISO-8859-1">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
    <style>
    
    body { 
			background-image: url(fondoauto.png) ;
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;
			background-color: #999;
  
}

</style>
  </head>

  <body>

    <div class="container">
<IMG SRC="logoappauto.png" WIDTH=80 HEIGHT=80 align="center">
      <form class="form-signin" name="form1" method="post" action="checklogin.php">
         
         <br><br><br>
     <h4 align="center" style="color:gray;">ACCESO A LA ZONA DE ADMINISTRACION DE LA APP</h4>
        <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Email" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Contraseña">
        <!-- The checkbox remember me is not implemented yet...
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        -->
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>

        <div id="message"></div>
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>

  </body>
</html>
