<?php
// actualizado oct 2021
// RZA
if($_SESSION['tipo_usuario']==5){
$pregunta = new consultaHistoria;
$listaHistorias = $pregunta->listarHistorias($conexion);
}else{
   $pregunta = new consultaHistoria;
    $cpny = $_SESSION['company_usuario'];
   $listaHistorias = $pregunta->listarHistoriasC($cpny,$conexion); 
}
echo "<table id=\"Tinformacion\" class=\"table-sm table-bordered table-hover dataTable\">";
echo "<thead>";
if($_SESSION['tipo_usuario']==5){
echo "<tr class=\"thead-light\"><th>ID</th><th>Nombre Historia</th><th>Proyecto</th><th>Fecha de inicio</th></tr>";	
	}else{
	echo "<tr><th>Nombre Historia</th><th>Proyecto</th><th>Fecha de inicio</th></tr>";	
	}
echo "</thead>";

echo "<tfoot></tfoot><tbody>";

foreach ($listaHistorias as $clave => $valor) {
	echo "<tr>";
	foreach($valor as $llave => $dato){
		// escribe un dato como link 
		if($_SESSION['tipo_usuario']==5){
			if($llave==0){
				echo "<td>".$dato."</td>";
				}
		}
					
			if($llave!=0 && $llave!=2){
				echo "<td>".$dato."</td>";
			}
        if($llave==2){
            $preguntapry = new consultaProyecto;
            $consultaProyecto = $preguntapry->consultarProyecto($dato, $conexion);
                 echo "<td>".$consultaProyecto[0]."</td>"; 
        }
			
			
			
		}
    echo"</tr>";
}
echo "</tbody>";
echo "</table>";

?>