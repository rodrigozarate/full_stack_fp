<?php
class consultaUsuario {
	
	function validar($usuario,$clave,$conexion) {	
		
		$stmt = $conexion->prepare("SELECT registro_usuario, estado_usuario FROM usuarios WHERE seudonimo_usuario = ? AND clave_usuario = ? AND estado_usuario = 0");
		$clave_transformada = md5($usuario.$clave);
		$stmt->bind_param('ss', $usuario, $clave_transformada);
		$stmt->execute();
		$stmt->bind_result($registro_usuario,$estado_usuario);
		$stmt->store_result();
		$numRows = $stmt->num_rows;
		$stmt->free_result();
		$stmt->close();
			if($numRows > 0){
				return true;
				}else{
				return false;
			}
		
		}
	
	function consultarPermiso($usuario,$clave,$conexion) {
		
		$stmt = $conexion->prepare("SELECT registro_usuario, tipo_usuario, nombre_usuario, correo_usuario, estado_usuario, company_usuario FROM usuarios WHERE seudonimo_usuario = ? AND clave_usuario = ?");
		$clave_transformada = md5($usuario.$clave);
		$stmt->bind_param('ss', $usuario, $clave_transformada);
		$stmt->execute();
		$stmt->bind_result($registro_usuario, $tipo_usuario, $nombre_usuario, $correo_usuario, $estado_usuario, $company_usuario);
		$stmt->fetch();
		$regTipo = array($registro_usuario, $tipo_usuario, $nombre_usuario, $correo_usuario, $estado_usuario, $company_usuario);
		return $regTipo;
		$stmt->close();
		}
		
	function listarUsuarios($conexion) {
		$stmt = $conexion->prepare("SELECT registro_usuario, correo_usuario, nombre_usuario, identificacion_usuario, estado_usuario, tipo_usuario, seudonimo_usuario, company_usuario FROM usuarios WHERE registro_usuario > '1'");
		$stmt->execute();
		$stmt->bind_result($registro_usuario, $correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $company_usuario);
		$datosUsuarios = array();
		while($stmt->fetch()){
		$datosUsuarios[]=array($registro_usuario, $correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $company_usuario);
			}
		return $datosUsuarios;
		$stmt->close();
		
		}
		
		
		function consultarUsuario($q_user,$conexion) {
		$stmt = $conexion->prepare("SELECT correo_usuario, nombre_usuario, identificacion_usuario, estado_usuario, tipo_usuario, seudonimo_usuario, company_usuario FROM usuarios WHERE registro_usuario = ?");
		$stmt->bind_param('i', $q_user);
		$stmt->execute();
		$stmt->bind_result($correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $company_usuario);
		$stmt->fetch();
		$datosUsuario = array($correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $company_usuario);
		return $datosUsuario;
		$stmt->close();
		
		}
		
		function editarUsuario($correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $q_user, $company_usuario, $conexion) {
		
		$stmt = $conexion->prepare("UPDATE usuarios SET correo_usuario = ?, nombre_usuario = ?, identificacion_usuario = ?, estado_usuario = ?, tipo_usuario = ?, seudonimo_usuario = ?, company_usuario = ? WHERE registro_usuario = ?");
		
		$stmt->bind_param('sssiisii', $correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $company_usuario, $q_user);
		
		$stmt->execute();
	
		return $stmt;
		$stmt->close();
		
		}
		
	function cambiarClave($seudonimo_usuario,$clave_usuario,$registro_usuario,$conexion){
			
			$stmt = $conexion->prepare("UPDATE usuarios SET clave_usuario = ? WHERE registro_usuario = ?");
			
			$clave_usuario_mod = md5($seudonimo_usuario.$clave_usuario);
			
			$stmt->bind_param('si',$clave_usuario_mod,$registro_usuario);
			
			$stmt->execute();
	
		return $stmt;
		
		$stmt->close();
			
			}
			
			// crear usuario
		
		function crearUsuario($correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $clave_usuario, $nacimiento_usuario, $company_usuario, $conexion) {
			
		$stmt = $conexion->prepare("INSERT INTO usuarios(correo_usuario,nombre_usuario,identificacion_usuario,estado_usuario,tipo_usuario,seudonimo_usuario,clave_usuario,nacimiento_usuario,company_usuario) VALUES (?,?,?,?,?,?,?,?,?)");
		
		$clave_usuario_mod = md5($seudonimo_usuario.$clave_usuario);
		
		
		$stmt->bind_param('sssiisssi', $correo_usuario, $nombre_usuario, $identificacion_usuario, $estado_usuario, $tipo_usuario, $seudonimo_usuario, $clave_usuario_mod, $nacimiento_usuario, $company_usuario);
		
		$stmt->execute();
	
		return $stmt;
		
		$stmt->close();
		
		}
		
		
	}
?>