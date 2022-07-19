<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

?>
<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Módulos</title>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos.css">
        <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">            
    </head>    
    <body>

      <div>
        <br><br>
      </div>
      
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="jumbotron">
                        
                        <h1 class="display-4 text-center"><strong>Módulos</strong></h1>
                      <h5 class="text-center">Usuario: <span class="badge badge-danger"><?php echo $_SESSION["s_usuario"];?></span></h5>                          
                      <hr class="my-4">          
                      <a class="btn badge-info btn-lg btn-block" href="orden.php" role="button">Orden de Pedido</a></p>
                      <a class="btn badge-primary btn-lg btn-block" href="facturacion.php" role="button">Facturación</a></p>
                      <a class="btn badge-success btn-lg btn-block" href="clientes.php" role="button">Base de Datos Clientes</a></p>            
                      <a class="btn badge-warning btn-lg btn-block" href="productos.php" role="button">Base de Datos Productos</a></p>
                      <div class="row justify-content-center align-items-center">
                        <a class="btn btn-outline-info btn-lg-4" href="../bd/logout.php" role="button">Cerrar Sesión</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>

     <script src="../jquery/jquery-3.3.1.min.js"></script>    
     <script src="../bootstrap/js/bootstrap.min.js"></script>    
     <script src="../popper/popper.min.js"></script>    
        
     <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="../codigo.js"></script>    
    </body>
</html>