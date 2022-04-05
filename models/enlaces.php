<?php

class Paginas{

	static public function enlacesPaginasModel($enlaces){

		switch ($enlaces){
            case "registro":
				$module =  "views/modules/".$enlaces.".php";
				break;
			case "ingresar":
				$module =  "views/modules/".$enlaces.".php";
				break;
			case "usuarios":
			$module =  "views/modules/".$enlaces.".php";
			break;
			case "editar":
			$module =  "views/modules/".$enlaces.".php";
			break;
			case "salir":
				$module =  "views/modules/".$enlaces.".php";
				break;
            case "dashboard":
                $module =  "views/modules/".$enlaces.".php";
            break;
            case "crear_ventas":
                $module =  "views/modules/".$enlaces.".php";
            break;
            case "ver_ventas":
                $module =  "views/modules/".$enlaces.".php";
            break;
            case "editar_ventas":
                $module =  "views/modules/".$enlaces.".php";
                break;
            
            
			case "registro_ok":
				$module = "views/modules/registro.php";
				break;
			case "registro_error":
				$module =  "views/modules/registro.php";
				break;
            case "eliminado_ok":
                $module = "views/modules/usuarios.php";
                break;
            case "eliminado_error":
                $module =  "views/modules/usuarios.php";
                break;
            case "actualizado_ok":
                $module = "views/modules/usuarios.php";
                break;
            case "actualizado_error":
                $module =  "views/modules/usuarios.php";
                break;
            case "ingresar_ok":
                $module = "views/modules/usuarios.php";
                break;
            case "ingresar_error":
                $module =  "views/modules/ingresar.php";
                break;
            case "ingresar_error_invalido":
                $module =  "views/modules/ingresar.php";
                break;
            case "ingresar_error_vacio":
                $module =  "views/modules/ingresar.php";
                break;

                case "registro_ventas_ok":
                    $module =  "views/modules/crear_ventas.php";
                break;
                case "registro_ventas_error":
                    $module =  "views/modules/crear_ventas.php";
                break;
                case "busqueda_error":
                    $module =  "views/modules/ver_ventas.php";
                break;
                case "Venta_eliminada":
                    $module =  "views/modules/ver_ventas.php";
                break;
                case "Venta_eliminada_error":
                    $module =  "views/modules/crear_ventas.php";
                break;
                case "actualizado_ventas_ok":
                    $module =  "views/modules/ver_ventas.php";
                break;
                case "actualizado_ventas_error":
                    $module =  "views/modules/ver_ventas.php";
                break;
                case "No_se_encontro_venta":
                    $module =  "views/modules/ver_ventas.php";
                break;
                case "busqueda_venta_error":
                    $module =  "views/modules/ver_ventas.php";
                break;
                case "No_inserto_datos":
                    $module =  "views/modules/ver_ventas.php";
                break;    
                

            default:
				$module =  "views/modules/dashboard.php";
		}



		return $module;

	}

}




