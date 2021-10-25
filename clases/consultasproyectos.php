<?php
class consultaProyecto {
		
	function listarProyectos($conexion) {
		$stmt = $conexion->prepare("SELECT id_proyecto, nombre_proyecto, id_company_proyecto, fecha_proyecto FROM proyectos WHERE '1'");
		$stmt->execute();
		$stmt->bind_result($id_proyecto, $nombre_proyecto, $id_company_proyecto, $fecha_proyecto);
		$datosProyectos = array();
		while($stmt->fetch()){
		$datosProyectos[]=array($id_proyecto, $nombre_proyecto, $id_company_proyecto, $fecha_proyecto);
			}
		return $datosProyectos;
		$stmt->close();
		}
		
		
		function consultarProyecto($q_proyecto,$conexion) {
		$stmt = $conexion->prepare("SELECT nombre_proyecto, id_company_proyecto, fecha_proyecto FROM proyectos WHERE id_proyecto = ?");
		$stmt->bind_param('i', $q_proyecto);
		$stmt->execute();
		$stmt->bind_result($nombre_proyecto, $id_company_proyecto, $fecha_proyecto);
		$stmt->fetch();
		$datosProyecto = array($nombre_proyecto, $id_company_proyecto, $fecha_proyecto);
		return $datosProyecto;
		$stmt->close();
		
		}
		
		function editarProyecto($nombre_proyecto, $id_company_proyecto, $q_proyecto, $conexion) {
		
		$stmt = $conexion->prepare("UPDATE proyectos SET nombre_proyecto = ?, id_company_proyecto = ? WHERE id_proyecto = ?");
		
		$stmt->bind_param('sii', $nombre_proyecto, $id_company_proyecto, $q_proyecto);
		
		$stmt->execute();
	
		return $stmt;
		$stmt->close();
		
		}
			
			// crear Proyecto
		
		function crearProyecto($nombre_proyecto, $id_company_proyecto, $conexion) {
			
		$stmt = $conexion->prepare("INSERT INTO proyectos(nombre_proyecto, id_company_proyecto) VALUES (?,?)");
		
		$stmt->bind_param('si', $nombre_proyecto, $id_company_proyecto);
		
		$stmt->execute();
	
		return $stmt;
		
		$stmt->close();
		
		}
		
		
	}
?>