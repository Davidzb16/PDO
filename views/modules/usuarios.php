<?php
    if(isset($_SESSION)){
        if(!$_SESSION["usuarioActivo"]){
            header("location:ingresar_error");
        }
    }else{
        header("location:ingresar_error");
        exit();
    }
    $usuarios=new MvcController();
    $usuarios -> ingresarUsuarioController();
    $usuarios -> borrarUsuarioController();
    $usuarios -> actualizarUsuarioController();
?>


    <?php
     

  
?>

<!DOCTYPE html>
<html dir="ltr" lang="es">

<?php
include "head.php";
?>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <?php
    include "navegacion.php";
    ?>
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
       
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Tabla de usuarios</h5>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                            
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Contraseña</th>
                                                <th scope="col">Email</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                            
                                        </thead>
                                        
                                        <tbody>
                                                <?php
                                                    $usuarios ->vistaUsuariosController();
                                                ?>


                                         </tbody>
                                    </table>
                                    <?php
                                      if (isset($_GET["action"])){
                                        if($_GET["action"]== "eliminado_ok"){
                                            echo "Usuario eliminado correctamente";
                                    
                                        }elseif ($_GET["action"]=="eliminado_error"){
                                            echo "Ocurrio un error al eliminar al usuario";
                                        }
                                    }
                                    
                                    
                                    
                                    if (isset($_GET["action"])){
                                        if($_GET["action"]== "actualizado_ok"){
                                            echo "Usuario actualizado correctamente";
                                    
                                        }elseif ($_GET["action"]=="actualizado_error"){
                                            echo "Ocurrio un error al actualizar al usuario";
                                        }
                                    }
                                    
                                    
                                    if (isset($_GET["action"])){
                                        if($_GET["action"]== "ingresar_ok"){
                                            echo "Bienvenido";
                                    
                                        }elseif ($_GET["action"]=="ingresar_error"){
                                            echo "Usuario o Contraseña incorrecta";
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <?php
    include "footer.php";
    ?>
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    
    

</body>

</html>

