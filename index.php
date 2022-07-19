<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Directorio de Contactos</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">            
    </head>
    
    <body>
     <div id="login">   
         <h4 class="text-center text-white display-4"><strong>Directorio de Contactos</strong></h4>         
         <div class="container">
             <div id="login-row" class="row justify-content-center align-items-center">
                 <div id="login-column" class="col-md-6">
                     
                     <div id="login-box" class="col-md-12 bg-light text-dark">
                         <form id="formLogin" class="form" action="" method="post">
                            <br>
                             <div class="form-group">
                                 <h4 for="titulo" class="text-center" aligntext="center"><span class="text-center text-black"><strong>Inicio de Sesión</strong></span></h4>
                             </div>
                             <div class="form-group">
                                 <label for="usuario" class="text-dark"><b>Usuario</b></label>
                                 <input type="text" name="usuario" id="usuario" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label for="password" class="text-dark"><b>Password</b></label>
                                 <input type="password" name="password" id="password" class="form-control">
                             </div>
                             
                             <div class="form-gropu text-center">
                                 <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Conectar">
                             </div>
                         </form>
                     </div>
                     
                 </div>
             </div>
         </div>         
     </div>        
         
     <script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="codigo.js"></script>    
    </body>
</html>