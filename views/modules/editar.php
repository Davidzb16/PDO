<?php


if(isset($_SESSION)){
    if(!$_SESSION["usuarioActivo"]){
        header("location:ingresar_ok");
    }
}else{
    header("location:ingresar_error");
    exit();
}

$editar = new MvcController();
$editar->actualizarUsuarioController();
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
                                        <h5 class="card-title m-b-0">Editar usuario</h5>
                                    </div>
                                        <div class="table-responsive">
                                            <form method="post" >
        

                                                        <?php
                                                            
                                                            $editar-> editarUsuarioController();
                                                            
                                                            
                                                        
                                                        
                                                        ?>
                                            </form>
                                                    
                                                    <div for="mensaje_error">
                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                       
                    </div>
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
            
            <!-- prueba -->

        </body>

</html>
