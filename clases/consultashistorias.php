<?php
class consultaHistoria {
		
	    function listarHistorias($conexion) {
		$stmt = $conexion->prepare("SELECT id_historia, nombre_historia, id_proyecto_historia, fecha_historia FROM historias WHERE '1'");
		$stmt->execute();
		$stmt->bind_result($id_historia, $nombre_historia, $id_proyecto_historia, $fecha_historia);
		$datosHistorias = array();
		while($stmt->fetch()){
		$datosHistorias[]=array($id_historia, $nombre_historia, $id_proyecto_historia, $fecha_historia);
			}
		return $datosHistorias;
		$stmt->close();
		}
    
    	function listarHistoriasC($company,$conexion) {
		$stmt = $conexion->prepare("SELECT id_historia, nombre_historia, id_proyecto_historia, fecha_historia FROM historias WHERE id_proyecto_historia IN (SELECT id_proyecto FROM proyectos WHERE id_company_proyecto = ".$company.")");
		$stmt->execute();
		$stmt->bind_result($id_historia, $nombre_historia, $id_proyecto_historia, $fecha_historia);
		$datosHistorias = array();
		while($stmt->fetch()){
		$datosHistorias[]=array($id_historia, $nombre_historia, $id_proyecto_historia, $fecha_historia);
			}
		return $datosHistorias;
		$stmt->close();
		}
		
		
		function consultarHistoria($q_historia,$conexion) {
		$stmt = $conexion->prepare("SELECT nombre_historia, id_proyecto_historia, fecha_historia  FROM historias WHERE id_historia = ?");
		$stmt->bind_param('i', $q_historia);
		$stmt->execute();
		$stmt->bind_result($nombre_historia, $id_proyecto_historia, $fecha_historia);
		$stmt->fetch();
		$datosHistoria = array($nombre_historia, $id_proyecto_historia, $fecha_historia);
		return $datosHistoria;
		$stmt->close();
		
		}
		
		function editarHistoria($nombre_historia, $id_proyecto_historia, $q_historia, $conexion) {
		
		$stmt = $conexion->prepare("UPDATE historias SET nombre_historia = ?, id_proyecto_historia = ? WHERE id_historia = ?");
		
		$stmt->bind_param('sii', $nombre_historia, $id_proyecto_historia, $q_historia);
		
		$stmt->execute();
	
		return $stmt;
		$stmt->close();
		
		}
			
			// crear Proyecto
		
		function crearHistoria($nombre_historia, $id_proyecto_historia, $nombre_ticket, $comentarios_ticket, $conexion) {
			
		$stmt = $conexion->prepare("INSERT INTO historias(nombre_historia, id_proyecto_historia) VALUES (?,?)");
		
		$stmt->bind_param('si', $nombre_historia, $id_proyecto_historia);
		
		$stmt->execute();
            
            $historia_insert_id = $stmt->insert_id;
	

            
            /* una historia siempre tiene un ticket */
            $stmt2 = $conexion->prepare("INSERT INTO tickets(nombre_ticket, comentarios_ticket, estado_ticket, id_historia_ticket) VALUES (?,?,?,?)");
            
            $estado_ticket = 0; /* default open state */
            $id_historia_ticket = $historia_insert_id;
            
            $stmt2->bind_param('ssii', $nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket);
            
            $stmt2->execute();
            
            $stmt2->close();
                
            
        return $stmt;

		$stmt->close();
		
		}
		
		
	}
?>