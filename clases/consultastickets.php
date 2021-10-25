<?php
class consultaTicket {
    
		
	    function listarTickets($conexion) {
		$stmt = $conexion->prepare("SELECT id_ticket, nombre_ticket, comentarios_ticket, estado_ticket, id_historia_ticket, fecha_ticket FROM tickets WHERE '1'");
		$stmt->execute();
		$stmt->bind_result($id_ticket, $nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket, $fecha_ticket);
		$datosTickets = array();
		while($stmt->fetch()){
		$datosTickets[]=array($id_ticket, $nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket, $fecha_ticket);
			}
		return $datosTickets;
		$stmt->close();
		}
    
    
    	function listarTicketsC($q_company,$conexion) {
            
           
        $stmt0 = $conexion->prepare("SELECT id_proyecto FROM proyectos WHERE id_company_proyecto = '".$q_company."' ");
		$stmt0->execute();
		$stmt0->bind_result($id_proyecto);
		$datosProyectos = array();
		while($stmt0->fetch()){
		$datosProyectos[] = $id_proyecto;
			}
            
		/* return $datosProyectos; */
            

		$stmt0->close();
            
            foreach($datosProyectos as $value){
                $condicion += " id_proyecto_ticket = '".$value."' OR ";
            }
            $condicion += " id_proyecto_ticket = '".$value."'";
            

            
           // $condicion = 1;
         echo " -- ".$condicion." -- "; 
          /* limit to projects of self company */  

		$stmt = $conexion->prepare("SELECT id_ticket, nombre_ticket, comentarios_ticket, estado_ticket, id_proyecto_ticket, fecha_ticket FROM tickets WHERE ".$condicion."  ");
		$stmt->execute();
		$stmt->bind_result($id_ticket, $nombre_ticket, $comentarios_ticket, $estado_ticket, $id_proyecto_ticket, $fecha_ticket);
		$datosTickets = array();
		while($stmt->fetch()){
		$datosTickets[]=array($id_ticket, $nombre_ticket, $comentarios_ticket, $estado_ticket, $id_proyecto_ticket, $fecha_ticket);
			}
		return $datosTickets;
		$stmt->close();
		}

		
		function consultarTicket($q_ticket,$conexion) {
		$stmt = $conexion->prepare("SELECT nombre_ticket, comentarios_ticket, estado_ticket, id_historia_ticket, fecha_ticket FROM tickets WHERE id_ticket = ?");
		$stmt->bind_param('i', $q_ticket);
		$stmt->execute();
		$stmt->bind_result($nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket, $fecha_ticket);
		$stmt->fetch();
		$datosTicket = array($nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket, $fecha_ticket);
		return $datosTicket;
		$stmt->close();
		
		}
        
		
		function editarTicket($nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket, $q_ticket, $conexion) {
		
		$stmt = $conexion->prepare("UPDATE tickets SET nombre_ticket = ?, comentarios_ticket = ?, estado_ticket = ?, id_historia_ticket = ? WHERE id_ticket = ?");
		
		$stmt->bind_param('ssiii', $nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket, $q_ticket);
		
		$stmt->execute();
	
		return $stmt;
		$stmt->close();
		
		}
        
			
			// crear Ticket
		
		function crearTicket($nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket, $conexion) {
			
		$stmt = $conexion->prepare("INSERT INTO tickets(nombre_ticket, comentarios_ticket, estado_ticket, id_historia_ticket) VALUES (?,?,?,?)");
		
		$stmt->bind_param('ssii', $nombre_ticket, $comentarios_ticket, $estado_ticket, $id_historia_ticket);
		
		$stmt->execute();
	
		return $stmt;
		
		$stmt->close();
		
		}
		

}
?>