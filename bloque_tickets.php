<?php
// actualizado oct 2021
// RZA

if($_SESSION['tipo_usuario']==5){
$pregunta = new consultaTicket;
$listaTickets = $pregunta->listarTickets($conexion);
}else{
   $pregunta = new consultaTicket;
    $cpny = $_SESSION['company_usuario'];
   $listaTickets = $pregunta->listarTicketsC($cpny,$conexion); 
}

echo "<table id=\"Tinformacion\" class=\"table-sm table-bordered table-hover dataTable\">";
echo "<thead>";
if($_SESSION['tipo_usuario']>=0){
echo "<tr class=\"thead-light\"><th>ID</th><th>Nombre Ticket</th><th>Comentarios</th><th>Estado</th><th>Historia</th><th>Fecha de inicio</th></tr>";	
	}else{
	echo "<tr><th>Nombre Ticket</th><th>Comentarios</th><th>Estado</th><th>Historia</th><th>Fecha de inicio</th></tr>";	
	}
echo "</thead>";

echo "<tfoot></tfoot><tbody>";



foreach ($listaTickets as $clave => $valor) {
	echo "<tr>";
	foreach($valor as $llave => $dato){
		// escribe un dato como link 
		if($_SESSION['tipo_usuario']>=0){
			if($llave==0){
				echo "<td><a data-toggle=\"modal\" data-target=\"#modalEditar\" data-idusuario=\"".$dato."\" data-ubicacion=\"frm_ticket.php?dt\" data-titulo=\"Editar Ticket\" href=\"#\">Editar ".$dato."</a></td>";
				}
		}
					
        if($llave!=0 && $llave!=3 && $llave!=4){
				echo "<td>".$dato."</td>";
        }
        
        if($llave==3){
            switch ($dato){
                   case 0; 
                    echo "<td class=\"caseopen\">Abierto</td>";
                    break;
                    case 1; 
                    echo "<td class=\"casedev\">En Desarrollo</td>";
                    break;
                    case 2; 
                    echo "<td class=\"caseclosed\">Cerrado</td>";
                    break;
                    
            }
				
        }
        
        if($llave==4){
            $preguntahis = new consultaHistoria;
            $consultaHistoria = $preguntahis->consultarHistoria($dato, $conexion);
                 echo "<td>".$consultaHistoria[0]."</td>"; 
        }
					
		}
    echo"</tr>";
}

echo "</tbody>";
echo "</table>";

?>