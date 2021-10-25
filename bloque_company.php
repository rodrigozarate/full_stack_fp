<?php
// actualizado oct 2021
// RZA
$pregunta = new consultaCompany;
$listaCompany = $pregunta->listarCompany($conexion);
echo "<table id=\"Tinformacion\" class=\"table-sm table-bordered table-hover dataTable\">";
echo "<thead>";
if($_SESSION['tipo_usuario']==5){
echo "<tr class=\"thead-light\"><th>ID</th><th>Compañía</th><th>NIT</th><th>Teléfono</th><th>Email</th></tr>";	
	}else{
	echo "<tr><th>Compañía</th><th>NIT</th><th>Teléfono</th><th>Email</th></tr>";	
	}
echo "</thead>";

echo "<tfoot></tfoot><tbody>";

foreach ($listaCompany as $clave => $valor) {
	echo "<tr>";
	foreach($valor as $llave => $dato){
		// escribe un dato como link 
		if($_SESSION['tipo_usuario']==5){
			if($llave==0){
				echo "<td><a data-toggle=\"modal\" data-target=\"#modalEditar\" data-idusuario=\"".$dato."\" data-ubicacion=\"frm_company.php?dt\" data-titulo=\"Editar Compañía\" href=\"#\">Editar ".$dato."</a></td>";
				}
		}
					
			if($llave!=0){
				echo "<td>".$dato."</td>";
			}
			
			
			
		}
    echo"</tr>";
}
echo "</tbody>";
echo "</table>";

?>