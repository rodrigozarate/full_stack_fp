<?php
session_start();
include('inclusion.php');
include('header.php');
if($_POST['registro']=='externo'){
	
		if(isset($_POST['nuevo']) && $_POST['nuevo']=='registro_usuario'){	
		
		
		// rutina de guardado de datos de nuevo usuario
		$insertar = new consultaUsuario;		
		$nacimiento_usuario = $_POST['nacimiento_usuario_a']."-".$_POST['nacimiento_usuario_m']."-".$_POST['nacimiento_usuario_d'];	
		$respuesta = $insertar->crearUsuario($_POST['correo_usuario'],$_POST['nombre_usuario'],$_POST['identificacion_usuario'],0,0,$_POST['n_seudonimo_usuario'],$_POST['n_clave_usuario'],$nacimiento_usuario,$_POST['company_usuario'],$conexion);
		
		//va a sistema.php
		?>
	<script>
	<!--
    irAlInicioLogin();
	-->
    </script>
	<?php
		 }
}
include('final.php');
?>
