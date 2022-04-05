<?php

$registro_ventas = new MvcController();
$registro_ventas ->registroVentasController();
$registro_ventas->borrarVentasController();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

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
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       <?php
       include "navegacion.php";
       ?>   
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Bien venido al area de ventas </h4>
                        <div class="ml-auto text-right">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid ">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-10">
                        
                        <div class="card">
                             <form class="form-horizontal" method="post">
                                <div class="card-body">
                                
                                    <h4 class="card-title">Registrar venta</h4>
                                    <div class="form-group row">
                                        <label for="fname"  class="col-sm-3 text-right control-label col-form-label">Producto</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="producto" name="producto" placeholder="Ingrese el Producto">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname"  class="col-sm-3 text-right control-label col-form-label">Precio</label>
                                        <div class="col-sm-9">
                                            <input type="int" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <?php
                                            ini_set('date.timezone','America/Costa_Rica');
                                            $fecha_actual= date("Y-m-d");
                                            ?>
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Fecha de venta</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $fecha_actual?>" >
                                        </div>
                                    </div>
                                   
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Registrar venta</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                     
                    </div>
                    
                </div>
            </div>
            <div class="card col-10" >
                            <div class="card-header ">
                                <h5>Ultima venta ingresada</h5>
                                
                            </div>
            

            <div class="card-block table-border-style">
            <div class="table-responsive">
            <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Detalle</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                               
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                     <?php
                        
                          $registro_ventas->ultima_Venta_Controller();
                        ?> 
                    </tbody>
                    </table>
            </div>
             </div>
        </div>
        
       
    
    </div>

 
</body>
<?php
    include "footer.php"
   ?>
</html>