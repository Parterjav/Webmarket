<?php
session_start();
if(!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] !=1) {
    header("location: login.php");
    exit;
}

//Conección a la base de datos
    require_once ("./models/database.php"); //Variables para la conexión a la base
    require_once ("./models/connect.php"); //Función que conecta a la base de datos
    include("./controllers/funciones.php");

    $active_productos="active";
    $active_clientes="";
    $active_usuarios="";
    $title="Facturas | Micromercado @-----";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
    <?php
      include("navbar.php");
      ?>  
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="btn-group pull-right">
            <a  href="nueva_factura.php" class="btn btn-default"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
          </div>
          <h4><i class='glyphicon glyphicon-search'></i> Buscar Facturas</h4>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" id="datos_cotizacion">
            <div class="form-group row">
              <label for="q" class="col-md-2 control-label">Cliente o #  factura</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="q" placeholder="Nombre del cliente o # de factura" onkeyup='load(1);'>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-default" onclick='load(1);'>
                <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                <span id="loader"></span>
              </div>
            </div>
          </form>
          <div id="resultados"></div>
          <!-- Carga los datos ajax -->
          <div class='outer_div'></div>
          <!-- Carga los datos ajax -->
        </div>
      </div>
    </div>
    <hr>
    <?php
      include("footer.php");
      ?>
    <script type="text/javascript" src="js/VentanaCentrada.js"></script>
    <script type="text/javascript" src="js/facturas.js"></script>
  </body>
</html>