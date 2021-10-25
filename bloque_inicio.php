<?php
// RZA octubre 2021
// inclusion para mostrar la tabla completa
echo "<div class=\"table-responsive\" >";
echo "<table id=\"Tinformacion\" class=\"table-sm table-bordered table-hover dataTable\">";
echo "<thead>";
echo "<tr class=\"thead-light\">";
echo "<th>Compañía</th>";
echo "</tr>";
echo "</thead>";

echo "<tfoot></tfoot><tbody>";

$pregunta = new consultaCompany;
$listaCompany = $pregunta->listarCompany($conexion);


foreach ($listaCompany as $clave => $valor) {
	echo "<tr>";
	foreach($valor as $llave => $dato){
		// escribe un dato como link 
	          if ($llave == 1){
				echo "<td><h2>".$dato."</h2><br>";
                
                    $pregunta2 = new consultaProyecto;
                    $listaProyectos = $pregunta2->listarProyectos($conexion);
                    foreach ($listaProyectos as $clave2 => $valor2) {
                     if ($listaCompany[$clave][0] == $listaProyectos[$clave2][2]){
                         echo " Proyecto - <strong>".$listaProyectos[$clave2][1]."</strong><br>";
                         
                         $pregunta3 = new consultaHistoria;
                         $listaHistorias = $pregunta3->listarHistorias($conexion);
                         foreach ($listaHistorias as $clave3 => $valor3) {
                             if ($listaProyectos[$clave2][0] == $listaHistorias[$clave3][2]){
                                 echo " Historia - - ".$listaHistorias[$clave3][1]."<br>";
                                 
                                 $pregunta4 = new consultaTicket;
                                 $listaTickets = $pregunta4->listarTickets($conexion);
                                 foreach ($listaTickets as $clave4 => $valor4) {
                                     if ($listaHistorias[$clave3][0] == $listaTickets[$clave4][4]){
                                         echo " Ticket - - - <em>".$listaTickets[$clave4][1]."</em> <br>".$listaTickets[$clave4][2]." - ";
                                         switch($listaTickets[$clave4][3]){
                                            case 0:
                                            echo "<span class=\"caseopen\"> Abierto </span>";
                                                 break;
                                             case 1:
                                             echo "<span class=\"casedev\"> Desarrollo </span>";
                                                 break;
                                             case 2:
                                                 echo "<span class=\"caseclosed\"> Cerrado </span>";
                                                 break;
                                         }
                                         echo "<em> -".$listaTickets[$clave4][5]."</em><br>";
                                     }
                                     
                                 }
                                 
                             }
                             
                         }
                         
                     }        
                    }
                
                echo "</td>";
              }
	
		}
    echo"</tr>";
}


echo "</tbody>";
echo "</table>";

echo "</div>";

?>