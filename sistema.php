<?php
session_start();
include('inclusion.php');
if(isset($_GET['panel'])){
	
	}else{
		$_GET['panel']="inicio";
	}
switch ($_GET['panel']){
	case "inicio":
	$titulo = "Inicio";
	break;
	case "company":
	$titulo = "Compañías";
	break;
	case "proyecto":
	$titulo = "Proyectos";
	break;
	case "usuarios":
	$titulo = "Usuarios";
	break;
	case "historias":
	$titulo = "Historias";
	break;
	case "tickets":
	$titulo = "Tickets";
	break;
	default :
	$titulo = "Inicio";
	break;
	
	}
include('header.php');

// remocion de la forma de ingreso

if(isset($_POST['seudonimo_usuario']) && isset($_POST['clave_usuario'])){
	
	$pregunta = new consultaUsuario;
	$respuesta = $pregunta->validar($_POST['seudonimo_usuario'],$_POST['clave_usuario'],$conexion);
	
	if($respuesta){
		// Los datos de post corresponden
	$_SESSION['valido'] = 1;
	
	$permisos = new consultaUsuario;
	$que_permisos = $permisos->consultarPermiso($_POST['seudonimo_usuario'],$_POST['clave_usuario'],$conexion);
	
	$_SESSION['registro_usuario'] = $que_permisos[0];
	$_SESSION['tipo_usuario'] = $que_permisos[1];
	$_SESSION['nombre_usuario'] = $que_permisos[2];
	$_SESSION['correo_usuario'] = $que_permisos[3];
	$_SESSION['seudonimo_usuario'] = $_POST['seudonimo_usuario'];
	// todo buscar generar una validacion coneste dato
	$_SESSION['estado_usuario'] = $que_permisos[4];
    $_SESSION['company_usuario'] = $que_permisos[5];
	
	}else{
		//Los datos de post no corresponden
		
	echo "<div class=\"alert alert-danger m-4\">	
			<h5 class=\"card-title\"><i class=\"fas fa-times-circle px-3\"></i>Error</h5>
			<p>Sus datos de usuario son incorrectos.</p>
         </div>";
		   
			session_destroy();
			$_POST= array();
	}
}

if(!isset($_SESSION['seudonimo_usuario']) || !isset($_SESSION['valido']) || $_SESSION['valido'] != '1'){
	// no hay datos en sesion o los datos son invalidos
	
	echo "<div class=\"alert alert-warning m-4\">
						
						<h5 class=\"card-title\"><i class=\"fas fa-times-circle px-3\"></i>Error</h5>
						<p>Por favor ingrese correctamente su usuario y contraseña.</p>
          </div>";
	
	echo "<div class=\"row m-4\">  
		  <div class=\"col\"> 	
					<a class=\"btn btn-primary btn-icon-split btn-lg\" href=\"index.php?salir=srv\">
					<span class=\"icon text-white-50\">
						 <i class=\"fas fa-backspace\"></i>
					</span>
    				<span class=\"text\">Regresar</span></a>
			</div>
	   		</div>";
}


if($_SESSION['valido']=='1'){
	// remove after debug
	// echo ($_SESSION);
	if($_SESSION['tipo_usuario'] >= '1'){
		echo "<div id=\"wrapper\">";
				include('menu_admin.php');
				include('panel_admin.php');
		echo "</div>";
	}else if($_SESSION['tipo_usuario'] == '0'){
        /* to do another interface */
        		echo "<div id=\"wrapper\">";
				include('menu_admin.php');
				include('panel_admin.php');
		        echo "</div>";
    }
	
}
// inclusion de ventanas modales para mostrar datos sin recargar página via AJAX
// RZA oct 2021
include('modal.php');
include('modal-editar.php');

include('final.php');

// mecanismo para verificar el post
// remove after debug
// var_dump($_POST);
// var_dump($_SESSION);
// echo "<br><br>";
?>


<?php
if($_SESSION['valido']=='1'){
	if($_SESSION['tipo_usuario']=='5'){
		if(isset($_POST['edicion']) && $_POST['edicion']=='9u'){		
		// rutina de guardado de datos de ususario
		$actualizar = new consultaUsuario;
		$respuesta = $actualizar->editarUsuario($_POST['correo_usuario'],$_POST['nombre_usuario'],$_POST['identificacion_usuario'],$_POST['estado_usuario'],$_POST['tipo_usuario'],$_POST['seudonimo_usuario'],$_POST['registro'],$_POST['company_usuario'],$conexion);
		// Oct 2021
		//RZA
		?>
	<script>
	<!--
    irAlInicioUsuario();
	-->
    </script>
	<?php
		 }
	}	
}
?>

<?php
if($_SESSION['valido']=='1'){
	if($_SESSION['tipo_usuario']=='5'){
		if(isset($_POST['nuevo']) && $_POST['nuevo']=='7'){	
		
		
		// rutina de guardado de datos de nuevo usuario
		$insertar = new consultaUsuario;		
		$nacimiento_usuario = $_POST['nacimiento_usuario_a']."-".$_POST['nacimiento_usuario_m']."-".$_POST['nacimiento_usuario_d'];	
		$respuesta = $insertar->crearUsuario($_POST['correo_usuario'],$_POST['nombre_usuario'],$_POST['identificacion_usuario'],$_POST['estado_usuario'],$_POST['tipo_usuario'],$_POST['n_seudonimo_usuario'],$_POST['n_clave_usuario'],$nacimiento_usuario,$_POST['company_usuario'],$conexion);
		
		//va a sistema.php
		?>
	<script>
	<!--
    irAlInicioUsuario();
	-->
    </script>
	<?php
		 }
	}	
}
?>


<?php

    
if($_SESSION['valido']=='1'){
	if($_SESSION['tipo_usuario']=='5'){
		if(isset($_POST['edicion']) && $_POST['edicion']=='5u'){	
		
		// rutina de cambio de clave de usuario
		$cambioclave = new consultaUsuario;			
		$respuesta = $cambioclave->cambiarClave($_POST['seudonimo'],$_POST['clave'],$_POST['registro'],$conexion);
		
		//va a sistema.php
		?>
	<script>
	<!--
    irAlInicioUsuario();
	-->
    </script>
	<?php
		 }
	}	
}
?>








<?php
if($_SESSION['valido']=='1'){
	if($_SESSION['tipo_usuario']=='5'){
		if(isset($_POST['nuevo']) && $_POST['nuevo']=='company_4'){	
		// rutina de guardado de datos
		$insertar = new consultaCompany;
		$respuesta = $insertar->crearCompany($_POST['nombre_company'],$_POST['nit_company'],$_POST['telefono_company'],$_POST['email_company'],$conexion);
		//va a index panel company
		?>
	<script>
	<!--
    irAlInicioCompany();
	-->
    </script>
	<?php
		 }
	}	
}
?>

<?php
if($_SESSION['valido']=='1'){
	if($_SESSION['tipo_usuario']=='5'){
		if(isset($_POST['edicion']) && $_POST['edicion']=='company_3'){	
		// rutina de edicion de datos
		$actualizar = new consultaCompany;
		$respuesta = $actualizar->editarCompany($_POST['nombre_company'],$_POST['nit_company'],$_POST['telefono_company'],$_POST['email_company'],$_POST['registro'],$conexion);
		//va a index Company
		?>
	<script>
	<!--
    irAlInicioCompany();
	-->
    </script>
	<?php
		 }
	}	
}
?>




<?php
if($_SESSION['valido']=='1'){
	if($_SESSION['tipo_usuario']>='3'){
		if(isset($_POST['nuevo']) && $_POST['nuevo']=='proyecto_4'){	
		// rutina de guardado de datos
		$insertar = new consultaProyecto;
		$respuesta = $insertar->crearProyecto($_POST['nombre_proyecto'],$_POST['id_company_proyecto'],$conexion);
		//va a index panel proyecto
		?>
	<script>
	<!--
    irAlInicioProyecto();
	-->
    </script>
	<?php
		 }
	}	
}
?>



<?php
if($_SESSION['valido']=='1'){
	if($_SESSION['tipo_usuario']>='3'){
		if(isset($_POST['edicion']) && $_POST['edicion']=='proyecto_3'){	
		// rutina de edicion de datos proyecto
		$actualizar = new consultaProyecto;
		$respuesta = $actualizar->editarProyecto($_POST['nombre_proyecto'],$_POST['id_company_proyecto'],$_POST['registro'],$conexion);
		//va a index proyecto
		?>
	<script>
	<!--
    irAlInicioProyecto();
	-->
    </script>
	<?php
		 }
	}	
}
?>
