<?php
    if(isset($_SESSION)){
        if(!$_SESSION["usuarioActivo"]){
            header("location:ingresar_error");
        }
    }else{
        header("location:ingresar_error");
        exit();
    }
    $ventas=new MvcController();
    
    $ventas -> registroVentasController();
    $ventas-> borrarVentasController();
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
                
            <?php
    
                if(isset($_GET["action"])){

                    if ($_GET["action"] == "busqueda_venta_error") {
                            echo  "No existe Venta";
                    }elseif ($_GET["action"] == "busqueda_error") {
                            echo "La fecha desde tiene que ser menor a la fecha hasta";
                    }elseif ($_GET["action"] == "No_inserto_datos") {
                            echo "No inserto datos";
                    }
            }
            ?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Tabla de ventas</h5>
                                
                                
                                <div class="card-body">
                                    <form  method="POST">
                                    <h5 class="card-title m-b-0">Busqueda por id</h5>
                                        <input type="text" placeholder="ID" id="keywords" name="id" size="20" maxlength="20">
                                        <input type="submit" value="Buscar">
                                    </form>
                                </div>

                                <div class="card-body">
                                    <form  method="POST">
                                     <h5 class="card-title m-b-0">Busqueda por fechas</h5>
                                        <label>Desde</label>
                                        <input type="date"  id="fecha1" name="fecha1" size="20" maxlength="20">
                                        <label>Hasta</label>
                                        <input type="date"  id="fecha2" name="fecha2" size="20" maxlength="20">

                                        <input type="submit" value="Buscar">
                                    </form>
                                </div>

                                
                                
                        </li>
                        
                            </div>
                            
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                            
                                        </thead>
                                        
                                        <tbody>
                                                <?php
                                                     $ventas ->vistaRangoFechasController();
                                                ?>


                                         </tbody>
                                    </table>
                                    <?php
                                      if (isset($_GET["action"])){
                                        if($_GET["action"]== "Venta_eliminada"){
                                            echo "Producto eliminado correctamente";
                                    
                                        }elseif ($_GET["action"]=="Venta_eliminada_error"){
                                            echo "Ocurrio un error al eliminar el Producto";
                                        }
                                    }
                                    
                                    
                                    
                                    if (isset($_GET["action"])){
                                        if($_GET["action"]== "actualizado_ventas_ok"){
                                            echo "Producto actualizado correctamente";
                                    
                                        }elseif ($_GET["action"]=="actualizado_ventas_error"){
                                            echo "Ocurrio un error al actualizar al Producto";
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