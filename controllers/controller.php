<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	static public function pagina(){	

		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------

	static public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
	#REGISTRO DE USUARIOS
	public static function  registroUsuarioController()
	{
		if (
			isset($_POST["nombre"]) &&
			isset($_POST["password"]) &&
			isset ($_POST["email"])
		) {
			if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
				if (preg_match('/^[A-Za-z0-9\_\-\.]{3,20}$/', $_POST["nombre"]) &&
					preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"]) &&
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST["password"])){
					$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$datos = array(
						"nombre" => $_POST["nombre"],
						"password" => $password,
						"email" => $_POST["email"]


					);
					$respuesta = Datos::registroUsuarioModel($datos, "usuarios");

					if ($respuesta == "success"){
						header("location:index.php?action=registro_ok");

					}else{
						header("location:index.php?action=registro_error");
					}
				}
			}
		}
	}
	#Vista Usuario

	public static function vistaUsuariosController()
	{
		$respuesta = Datos::vistaUsuariosModel("usuarios");

		foreach ($respuesta as $key => $value){
			echo ' <tr>
				<td>'.$value["nombre"].'</td>
				<td>*****************</td>
				<td>'.$value["email"].'</td>
				<td>
					<a href="editar&idEditar='.$value["id"].'">
					
					<button class = "btn btn-success float-right"><i class="fas fa-pencil-alt"></i>
						Editar
					</button>
					</a>
				</td>
				<td>
					<a href="usuarios&idBorrar='.$value["id"].'">
					<button class = "btn btn-success float-right"><i class="far fa-trash-alt"></i>
						Borrar
					</button>
					</a>
				</td>
			</tr>
			';
		}
	}
	#borrar usuarios
	public static function borrarUsuarioController(){
		if (isset($_GET["idBorrar"]) ){
			$datos = $_GET["idBorrar"];
			$respuesta = Datos::borrarUsuarioModel ($datos, "usuarios");
			if ( $respuesta=="success"){
				header("location:eliminado_ok");
			}else{
				header("location:eliminado_error");
			}


		}
	}
	#editar usuarios
	public static function editarUsuarioController()
	{
		if (isset($_GET["idEditar"])) {
			$datos = $_GET["idEditar"];
			$respuesta = Datos::editarUsuarioModel($datos, "usuarios");
			echo '
	<input type="hidden" name="id" value="'.$respuesta["id"].'" required>
	<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
	</div>

	<input type="text" class="form-control form-control-lg"  placeholder="Usuario" name="nombre" id="nombre_registro" value="'.$respuesta["nombre"].'" aria-label="Username" aria-describedby="basic-addon1" required>
	</div>
	<!-- email -->
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
		</div>
		<input type="email" class="form-control form-control-lg" placeholder="Email" name="email" id="email_registro" value="'.$respuesta["email"].'" aria-label="Username" aria-describedby="basic-addon1" required>
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
		</div>
		<input type="password" class="form-control form-control-lg" placeholder="Contraseña" name="password" aria-label="Password" aria-describedby="basic-addon1" required>
	</div>




	<button class="btn btn-primary float-left" type="submit">Editar</button>';
		}
	}

	#ACTUALIZAR USUARIO
	public static function actualizarUsuarioController(){
		if (
			isset($_POST["id"]) &&
			isset($_POST["nombre"]) &&
			isset($_POST["password"]) &&
			isset ($_POST["email"])
		) {
			//$password = crypt($_POST['password'], '$2a$07assxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$datos = array(
				"id" => $_POST["id"],
				"nombre" => $_POST["nombre"],
				"password" => $password,
				"email" => $_POST["email"]

			);
			$respuesta = Datos::actualizarUsuarioModel($datos, "usuarios");

			if ($respuesta == "success"){
				header("location:actualizado_ok");

			}else{
				header("location:actualizado_error");
			}

		}
	}
	#INGRESO DE USUARIOS
	public static function ingresarUsuarioController(){
		if  (

			isset($_POST["nombre"]) &&
			isset($_POST["password"])
		){
			if( !empty($_POST["nombre"]) && !empty($_POST["password"])) {
				if (preg_match('/^[A-Za-z0-9\_\-\.]{3,20}$/', $_POST["nombre"]) &&
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST["password"])) {


					//$password = crypt($_POST['password'], '$2a$07assxx54ahjppf45sd87a5a4dDDGsystemdev$');
					//$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

					$password = $_POST["password"];
					$datos = array(

						"nombre" => $_POST["nombre"],
						"password" => $password
					);
					$respuesta = Datos::ingresarUsuarioModel($datos, "usuarios");


					if ($respuesta["nombre"] == $datos["nombre"] && password_verify($_POST["password"], $respuesta["password"])) {
						$_SESSION["usuarioActivo"] = true;
						header("location:ingresar_ok");

					}else{
						header("location:ingresar_error");
					}
				}else{
					header("location:ingresar_error_invalido");
				}
			}else{
				header("location:ingresar_error_vacio");
			}
		}
	}

	public static function validarUsuarioController($datos){
		$respuesta = 0;
		if( !empty($datos)){
			if (preg_match('/^[A-Za-z0-9\_\-\.]{3,20}$/', $datos) )  {
				$respuesta = Datos::validarUsuarioModel($datos);
				if($respuesta[0] > 0){
					$respuesta = 1;
				}else{
					$respuesta = 0;
				}
			}
		}   
		return $respuesta;
	}

	public static function validarEmailController($datos){
		$respuesta = 0;
		if( !empty($datos)){
			if (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $datos) )  {
				$respuesta = Datos::validarEmailModel($datos);
				if($respuesta[0] > 0){
					$respuesta = 1;
				}else{
					$respuesta = 0;
				}
			}
		}   
		return $respuesta;
	}

// -------------------------------------------------
// registra las ventas
public static function registroVentasController(){ 
	if(
	isset($_POST["producto"]) &&  
	isset($_POST["precio"])&&  
	isset($_POST["fecha"])
	
	){
		if(!empty($_POST["producto"]) && !empty($_POST["precio"])&& !empty($_POST["fecha"])){
			if(preg_match('/^[a-zA-Z]{3,30}$/',$_POST["producto"])&&
			   preg_match('/^[0-9,]{2,10}$/',$_POST["precio"])&&
			   preg_match('/^[0-9-]+$/',$_POST["fecha"]))
			   
					{
			  
				$datos = array(
				  "producto" => $_POST["producto"],
				  "precio" => $_POST["precio"],
				  "fecha" => $_POST["fecha"],
				 
				   );
			  $respuesta = Datos::registroVentasModel($datos,"ventas");
			  
			  if($respuesta == "success"){
				  
						header("location:registro_ventas_ok");
						   
				  
			  }else {
				  
						header("location:registro_ventas_error");
			  }
			}  }
			}
		}
		
// vista de las ventas
public static function vistaVentasController(){
        
	$respuesta = Datos::vistaVentasModel("ventas");
	$precio_total = array_sum(array_column($respuesta, 'precio'));
	foreach ($respuesta as $key => $value){
		echo'
		  <tr>
				  <td>'.$value["id"].'</td>
				  <td>'.$value["producto"].'</td>
				  <td>'.$value["precio"].'</td>
				  <td>'.$value["fecha"].'</td>
				  
				  

				 <td>
				  
					<a href="editar_ventas&idEditar='.$value["id"].'">
						
						<button class="btn btn-success btn-round pu waves-effect waves-light">
							<label>Editar </label>
						</button>
					<a/>
				  </td>
				  <td>
					<a href="ver_ventas&idBorrar='.$value["id"].'">
						
						<button class="btn btn-danger btn-round pu waves-effect waves-light">
							<label>Borrar </label>
						</button>
					<a/>
				 </td>
				 
		  </tr>
	
		';
	}
	echo '
							<div>
							<h5 class="text-c-blue">TOTAL:</h5>


								  <div class="row">
									 <div class="col-md-1 text">
								<h5 class="text-c-blue colon" >₡</h5>
							</div>
							<div class="col-1">
								<h5 class="text-c-blue">'.$precio_total.'</h5>
						</div>
						</div>
						  </div>  ';
	
}

public static function vistaRangoFechasController(){
        
	if(
		isset($_POST["fecha1"]) &&  
		isset($_POST["fecha2"]) 
	){
		if($_POST["fecha1"] <= $_POST["fecha2"]){
			
					if(!empty($_POST["fecha1"]) && !empty($_POST["fecha2"])){
						 if(preg_match('/^[0-9-]+$/',$_POST["fecha1"])&&
							preg_match('/^[0-9-]+$/',$_POST["fecha2"])){
							$datos = array(
							"fecha1" => $_POST["fecha1"],
							"fecha2" => $_POST["fecha2"]
							 );

					  $respuesta = Datos::vistaRangoFechasModel($datos,"ventas");
					  $precio_total = array_sum(array_column($respuesta, 'precio'));
					  
						foreach ($respuesta as $key => $value){
								  
						echo'
						  <tr>
								  <td>'.$value["id"].'</td>
								  <td>'.$value["producto"].'</td>
								  <td>'.$value["precio"].'</td>
								  <td>'.$value["fecha"].'</td>

								  
								 <td>
				  
									<a href="editar_ventas&idEditar='.$value["id"].'">

										<button class="btn btn-success btn-round pu waves-effect waves-light">
											<label>Editar </label>
										</button>
									<a/>
								  </td>
								  <td>
									<a href="ver_ventas&idBorrar='.$value["id"].'">

										<button class="btn btn-danger btn-round pu waves-effect waves-light">
											<label>Borrar </label>
										</button>
									<a/>
								 </td>
				 
						  </tr>
						  
						';
						
					}
					echo '
							<div>
							<h5 class="text-c-blue">TOTAL:</h5>


								  <div class="row">
									 <div class="col-md-1 text">
								<h5 class="text-c-blue colon">₡</h5>
							</div>
							<div class="col-1">
								<h5 class="text-c-blue">'.$precio_total.'</h5>
						</div>
						</div>
						  </div>  ';
							}
							
			}else{
				$vista = new MvcController;
				$mostrar = $vista->vistaVentasController(); 
				echo $mostrar;
		}       
			} else {
			
			 echo '<script>
			window.location.href = "busqueda_error";
		   </script>';
			}
		} elseif (isset($_POST["id"])) {
			
		$vista = new MvcController;
				$mostrar = $vista->idVentasController(); 
				echo $mostrar;
	}  
	else {
			$vista = new MvcController;
				$mostrar = $vista->vistaVentasController(); 
				echo $mostrar;
}  


	}

	 
	 
public static function ultima_Venta_Controller(){
	
	$respuesta = Datos::vista_Ultima_Ventas_Model("ventas");
	$precio_total = array_sum(array_column($respuesta, 'precio'));
	foreach ($respuesta as $key => $value){
		echo'
		  <tr>
		  
				  <td>'.$value["id"].'</td>
				  <td>'.$value["producto"].'</td>
				  <td>'.$value["precio"].'</td>
				  <td>'.$value["fecha"].'</td>
				 
				  
				  <td>
				  
					<a href="editar_ventas&idEditar='.$value["id"].'">
						
						<button class="btn btn-success btn-round pu waves-effect waves-light">
							<label>Editar </label>
						</button>
					<a/>
				  </td>
				  <td>
					<a href="ver_ventas&idBorrar='.$value["id"].'">
						
						<button class="btn btn-danger btn-round pu waves-effect waves-light">
							<label>Borrar </label>
						</button>
					<a/>
				 </td>
				 
		  </tr>
		';
	}

}


public static function idVentasController(){
	if(
		isset($_POST["id"]) 
	){
	if(!empty($_POST["id"])){
		if(preg_match('/^[0-9]{1,20}$/',$_POST["id"])){
			$datos = array(
			"id" => $_POST["id"]
					);
			
					$respuesta = Datos::IdventasModel($datos,"ventas");
					$precio_total = array_sum(array_column($respuesta , 'precio'));
					if($respuesta <> null){  
					foreach ($respuesta as $key => $value){
						echo'
						  <tr>
								  <td>'.$value["id"].'</td>
								  <td>'.$value["producto"].'</td>
								  <td>'.$value["precio"].'</td>
								  <td>'.$value["fecha"].'</td>
								 
								  <td>

								 <td>

									<a href="editar_ventas&idEditar='.$value["id"].'">

										<button class="btn btn-success btn-round pu waves-effect waves-light">
											<label>Editar </label>
										</button>
									<a/>
								  </td>
								  <td>
									<a href="ver_ventas&idBorrar='.$value["id"].'">

										<button class="btn btn-danger btn-round pu waves-effect waves-light">
											<label>Borrar </label>
										</button>
									<a/>
								 </td>

						  </tr>

						';
					}
					echo '
											<div>
											<h5 class="text-c-blue">TOTAL:</h5>


												  <div class="row">
													 <div class="col-md-1 text">
												<h5 class="text-c-blue colon" >₡</h5>
											</div>
											<div class="col-1">
												<h5 class="text-c-blue">'.$precio_total.'</h5>
										</div>
										</div>
										  </div>  ';
							   
					
					
					} else {
						
					echo '<script>
									window.location.href = "busqueda_venta_error";
									
								   </script>';
				  } 
		
				  }    
				  
			  }else {
					echo '<script>
									window.location.href = "No_inserto_datos";
								   </script>';
				  }
		 }
	   }


public static function borrarVentasController() {
	if (isset($_GET["idBorrar"]) ){
		$datos = $_GET["idBorrar"];
		$respuesta = Datos::borrarVentaModel ($datos, "ventas");
		if ( $respuesta=="success"){
			header("location:Venta_eliminada");
		}else{
			header("location:Venta_eliminada_error");
		}


	}
	 }


public static function editarventasController() {
	if (isset($_GET["idEditar"])) {
		$datos = $_GET["idEditar"];
		$respuesta = Datos::editarventasModel($datos, "ventas");
		echo '
		
				<div class="card-body">
						
					<h4 class="card-title">Registrar venta</h4>
					<input type="hidden" name="id" value="'.$respuesta["id"].'"required>      
                                   <br/>
					<div class="form-group row">
						<label for="fname"  class="col-sm-3 text-right control-label col-form-label">Producto</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="producto" value="'.$respuesta["producto"].'" name="producto" >
								   
						</div>
					</div>
					<div class="form-group row">
						<label for="lname"  class="col-sm-3 text-right control-label col-form-label">Precio</label>
						<div class="col-sm-9">
							<input type="int" class="form-control" id="precio" name="precio" value="'.$respuesta["precio"].'" >
						</div>
					</div>
					<div class="form-group row">
	
						<label for="lname" class="col-sm-3 text-right control-label col-form-label">Fecha de venta</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="fecha"  name="fecha" value="'.$respuesta["fecha"].'" >
						</div>
					</div>
						   
					
					<div class="card-body">
						<button type="submit" class="btn btn-primary">Actualizar venta</button>
					</div>
						
				</div>
				
			 
			
			
		';
	}

		   }


public static function actualizarVentasController(){ 
			   if(
			   isset($_POST["id"]) &&
			   isset($_POST["producto"]) &&  
			   isset($_POST["precio"])&&  
			   isset($_POST["fecha"])

			   
			   
			   ){
				   if(!empty($_POST["id"])&&!empty($_POST["producto"]) && !empty($_POST["precio"])&& !empty($_POST["fecha"])){
					   if(preg_match('/^[0-9]{1,20}$/',$_POST["id"])&&
						  preg_match('/^[a-zA-Z]{3,30}$/',$_POST["producto"])&&
						  preg_match('/^[0-9,]{2,10}$/',$_POST["precio"])&&
						  preg_match('/^[0-9-]+$/',$_POST["fecha"])

						  
				   
						){     
						 $datos = array(
							 "id" => $_POST["id"],
							 "producto" => $_POST["producto"],
							 "precio" => $_POST["precio"],
							 "fecha" => $_POST["fecha"]
							  );
						 $respuesta = Datos::actulizarventasModel($datos,"ventas");
					   
							if($respuesta == "success"){
								header("location:actualizado_ventas_ok");

							}else {
								  header("location:actualizado_ventas_error");

							}
						   }
				   }
					   }
				   }          


public static function preciodasController(){
	
	$respuesta = Datos::vistaVentasModel("ventas");
	$precio_total = array_sum(array_column($respuesta, 'precio'));

	echo '<h5 class="text-white">'.$precio_total.'</h5>';
}

public static function usuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");
		$usuario_total = count(array_column($respuesta, 'nombre'));

		echo '<h5 class="text-white">'.$usuario_total.'</h5>';
}


}    




