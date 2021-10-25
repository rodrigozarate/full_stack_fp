<?php
class consultaServicio{

function registrarLog($conexion,$tipo_dato,$que_hizo){
	$tiempo = date("Y-M-D");
	$hora = date("h:m");
	// echo "-".$tiempo."-";
	$persona=$_SESSION["nombre_usuario"];
$stmt = $conexion->query("INSERT INTO auditoria (auditoria_usuario,auditoria_accion,auditoria_fecha,auditoria_hora,auditoria_consulta)VALUES(".$persona.",".$tipo_dato.",".$tiempo.",".$hora.",".$que_hizo.")") or exit ("Error code ({$stmt->errno}): {$stmt->error}");
			return $stmt;
			$stmt->close();
}
	
		function contarServicios($conexion){
			$stmt = $conexion->query("SELECT srv_id FROM servicios WHERE 1");
			return $stmt;
			$stmt->close();
			}
		
		// nueva clase con filtro sin facturar	
		function contarServiciosSinFact($conexion){
			$stmt = $conexion->query("SELECT srv_id,srv_estado FROM servicios WHERE srv_estado < 4 ");
			return $stmt;
			$stmt->close();
			}
			
		function listarServicios($reg,$conexion){
			
		$stmt = $conexion->query("SELECT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_expediente, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios WHERE 1 ORDER BY srv_dia DESC, srv_hora DESC LIMIT 20 OFFSET ".$reg." ") or exit ("Error code ({$stmt->errno}): {$stmt->error}");
		return $stmt;
		$stmt->close();
		}
		
		
		function listarServiciosSinFact($reg,$conexion){
			
		$stmt = $conexion->query("SELECT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_expediente, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios WHERE srv_estado < 4 ORDER BY srv_dia DESC, srv_hora DESC LIMIT 20 OFFSET ".$reg." ") or exit ("Error code ({$stmt->errno}): {$stmt->error}");
		return $stmt;
		$stmt->close();
		}
		
		
		function listarServiciosPorEstado($reg,$estado,$conexion){
			
		$stmt = $conexion->query("SELECT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_expediente, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios WHERE srv_estado = '".$estado."' ORDER BY srv_dia DESC, srv_hora DESC LIMIT 20 OFFSET ".$reg." ") or exit ("Error code ({$stmt->errno}): {$stmt->error}");
		return $stmt;
		$stmt->close();
		}
		
		
		
		function listarServiciosPorFecha($fecha,$conexion){
			$cualquery = "SELECT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_expediente, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios WHERE srv_dia = '".$fecha."' ORDER BY srv_dia DESC, srv_hora DESC";
			$stmt = $conexion->query($cualquery) or exit("Error code ({$stmt->errno}): {$stmt->error}");
			return $stmt;
			$stmt->close();
		}
		
		
		
		
		function listarServiciosPorFechaYTecnico($cual_tec,$fecha,$conexion){		
			
			$cuanto_son ="SELECT DISTINCT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_expediente, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios, gestion WHERE srv_dia = '".$fecha."' AND gest_servicio = srv_id AND gest_tecnico = '".$cual_tec."' ORDER BY srv_dia DESC, srv_hora DESC";
			$stmt = $conexion->query($cuanto_son) or exit("Error code ({$stmt->errno}): {$stmt->error}");
			return $stmt;
			$stmt->close();
			}
			
	// dom 16 abr 2017
	// nueva funcion para enviar a la app y devolver los id de los servicios		
	function listarServiciosPorTecnico($cual_tec,$conexion){		
			
			$servi_son ="SELECT DISTINCT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_expediente, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios, gestion WHERE gest_servicio = srv_id AND gest_tecnico = '".$cual_tec."' ORDER BY srv_dia DESC, srv_hora DESC LIMIT 20";
			$stmt = $conexion->query($servi_son) or exit("Error code ({$stmt->errno}): {$stmt->error}");
			return $stmt;
			$stmt->close();
			}	
		
		
		
		
		
		
		
		
		
		function listarServiciosBuscados($q_busca,$conexion){
		$buscar_mod = "%".$q_busca."%";	
		$elquery = "SELECT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_expediente, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios WHERE srv_expediente LIKE '".$buscar_mod."' OR srv_asegurado LIKE '".$buscar_mod."' OR srv_direccion LIKE '".$buscar_mod."' OR srv_dia  LIKE '".$buscar_mod."' ORDER BY srv_dia DESC, srv_hora DESC";
		$stmt = $conexion->query($elquery) or exit("Error code ({$stmt->errno}): {$stmt->error}");
		return $stmt;
		$stmt->close();
		}
		
		
		function consultarServicio($id_servicio,$conexion){
		$stmt = $conexion->prepare("SELECT srv_id, srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_fecha_inicio, srv_actualizacion, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_expediente, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial FROM servicios WHERE srv_id = ?");
		$stmt->bind_param('i', $id_servicio);
		$stmt->execute();
		$stmt->bind_result($srv_id, $srv_coordinador, $srv_aseguradora, $srv_tipo_servicio, $srv_fecha_inicio, 	$srv_actualizacion, $srv_ciudad, $srv_barrio, $srv_asegurado, $srv_direccion, $srv_kilometraje, $srv_expediente, $srv_valor, $srv_estado, $srv_hora, $srv_dia, $srv_atencion, $srv_filial);
		$stmt->fetch();
		$datosServicio = array($srv_id, $srv_coordinador, $srv_aseguradora, $srv_tipo_servicio, $srv_fecha_inicio, $srv_actualizacion, $srv_ciudad, $srv_barrio, $srv_asegurado, $srv_direccion, $srv_kilometraje, $srv_expediente, $srv_valor, $srv_estado, $srv_hora, $srv_dia, $srv_atencion, $srv_filial);
		return $datosServicio;
		$stmt->close();
		}
		// por editar
		function editarServicio($srv_coordinador, $srv_aseguradora, $srv_tipo_servicio, $srv_fecha_inicio, $srv_ciudad, $srv_barrio, $srv_asegurado, $srv_direccion, $srv_kilometraje, $srv_expediente, $srv_valor, $srv_estado, $srv_hora, $srv_dia, $srv_atencion, $srv_filial, $srv_id, $conexion){
			
			
			
			$stmt = $conexion->prepare("UPDATE servicios SET srv_coordinador = ?, srv_aseguradora = ?, srv_tipo_servicio = ?, srv_fecha_inicio = ?, srv_ciudad = ?, srv_barrio = ?, srv_asegurado = ?, srv_direccion = ?, srv_kilometraje = ?, srv_expediente = ?, srv_valor = ?, srv_estado = ?, srv_hora = ?, srv_dia = ?, srv_atencion = ?, srv_filial = ? WHERE srv_id = ?");
			//$que_hizo = $stmt;
			//$que_hizo = "vaca";
			//$tipo_dato = "cambiar";
			// se inserta el registro de la operacion
			// viernes 31 de mayo de 2019
			// registrarLog($conexion,$tipo_dato,$que_hizo);
			// Rodrigo Zarate
			
			
		$stmt->bind_param('iiisssssisiisssii', $srv_coordinador, $srv_aseguradora, $srv_tipo_servicio, $srv_fecha_inicio, $srv_ciudad, $srv_barrio, $srv_asegurado, $srv_direccion, $srv_kilometraje, $srv_expediente, $srv_valor, $srv_estado, $srv_hora, $srv_dia, $srv_atencion, $srv_filial, $srv_id);
		$stmt->execute();
//Registrar consulta

		// or exit("Error code ({$stmt->errno}): {$stmt->error}");
		return $stmt;
		$stmt->close();
			
			
			
			}
		// por crear
		function crearServicio($srv_coordinador, $srv_aseguradora, $srv_tipo_servicio, $srv_fecha_inicio, $srv_ciudad, $srv_barrio, $srv_asegurado, $srv_direccion, $srv_kilometraje, $srv_expediente, $srv_valor, $srv_estado, $srv_hora, $srv_dia, $srv_atencion, $srv_filial, $conexion){
			
			
			$stmt = $conexion->prepare("INSERT INTO servicios (srv_coordinador, srv_aseguradora, srv_tipo_servicio, srv_fecha_inicio, srv_ciudad, srv_barrio, srv_asegurado, srv_direccion, srv_kilometraje, srv_expediente, srv_valor, srv_estado, srv_hora, srv_dia, srv_atencion, srv_filial) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			
			//$que_hizo = $stmt;
			//$que_hizo = "mico 1";
			//$tipo_dato = "crear 1";
			// se inserta el registro de la operacion
			// viernes 31 de mayo de 2019
			//registrarLog($conexion,$tipo_dato,$que_hizo);
			// Rodrigo Zarate
			
		$stmt->bind_param('iiisssssisiisssi', $srv_coordinador, $srv_aseguradora, $srv_tipo_servicio, $srv_fecha_inicio, $srv_ciudad, $srv_barrio, $srv_asegurado, $srv_direccion, $srv_kilometraje, $srv_expediente, $srv_valor, $srv_estado, $srv_hora, $srv_dia, $srv_atencion, $srv_filial);
		
		$stmt->execute();
		// or exit("Error code ({$stmt->errno}): {$stmt->error}");
		return $stmt;
		$stmt->close();
			
			
			}
	}
?>