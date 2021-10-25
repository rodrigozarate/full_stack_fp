<?php
// actualizado oct 2021
// RZA
$pregunta = new consultaProyecto;
$listaProyectos = $pregunta->listarProyectos($conexion);
echo "<table id=\"Tinformacion\" class=\"table-sm table-bordered table-hover dataTable\">";
echo "<thead>";
if($_SESSION['tipo_usuario']==5){
echo "<tr class=\"thead-light\"><th>ID</th><th>Nombre Proyecto</th><th>Compañía</th><th>Fecha de inicio</th></tr>";	
	}else{
	echo "<tr><th>Nombre Proyecto</th><th>Compañía</th><th>Fecha de inicio</th></tr>";	
	}
echo "</thead>";

echo "<tfoot></tfoot><tbody>";

foreach ($listaProyectos as $clave => $valor) {
	echo "<tr>";
	foreach($valor as $llave => $dato){
		// escribe un dato como link 
		if($_SESSION['tipo_usuario']==5){
			if($llave==0){
				echo "<td><a data-toggle=\"modal\" data-target=\"#modalEditar\" data-idusuario=\"".$dato."\" data-ubicacion=\"frm_proyecto.php?dt\" data-titulo=\"Editar Proyecto\" href=\"#\">Editar ".$dato."</a></td>";
				}
		}
					
			if($llave!=0 && $llave!=2){
				echo "<td>".$dato."</td>";
			}
        if($llave==2){
            $preguntacmp = new consultaCompany;
            $consultaCompany = $preguntacmp->consultarCompany($dato, $conexion);
                 echo "<td>".$consultaCompany[0]."</td>"; 
        }
			
			
			
		}
    echo"</tr>";
}
echo "</tbody>";
echo "</table>";

?>