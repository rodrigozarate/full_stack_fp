<?php
// actualizado oct 2021
// RZA
$pregunta = new consultaUsuario;
$listaUsuarios = $pregunta->listarUsuarios($conexion);
echo "<table id=\"Tinformacion\" class=\"table-sm table-bordered table-hover dataTable\">";
echo "<thead>";
if($_SESSION['tipo_usuario']==5){
echo "<tr class=\"thead-light\"><th>ID</th><th>correo</th><th>Nombre</th><th>Identificación</th><th>Estado</th><th>Tipo</th><th>Seudónimo</th><th>Compañía</th></tr>";	
	}else{
	echo "<tr><th>correo</th><th>Nombre</th><th>Identificación</th><th>Estado</th><th>Tipo</th><th>Seudónimo</th><th>Compañía</th></tr>";	
	}
echo "</thead>";

echo "<tfoot></tfoot><tbody>";



foreach ($listaUsuarios as $clave => $valor) {
	echo "<tr>";
	foreach($valor as $llave => $dato){
		// escribe un dato como link 
		if($_SESSION['tipo_usuario']==5){
			if($llave==0){
				echo "<td><a data-toggle=\"modal\" data-target=\"#modalEditar\" data-idusuario=\"".$dato."\" data-ubicacion=\"frm_usuario.php?dt\" data-titulo=\"Editar Usuario\" href=\"#\">Editar ".$dato."</a></td>";
				}
		}
			
			if($llave==4){
				switch ($dato){
					case 0 :
					echo "<td>Activo</td>";
					break;
					case 1 :
					echo "<td>Inactivo</td>";
					break;
					case 2 :
					echo "<td>Bloqueado</td>";
					break;
					}
				}
			
			if($llave==5){
				switch ($dato){
					case 0 :
					echo "<td>Usuario</td>";
					break;
					case 3 :
					echo "<td>Desarrollador</td>";
					break;
					case 5 :
					echo "<td>Administrador</td>";
					break;
					}
				}
				
			if($llave!=0 && $llave!=4 && $llave!=5 && $llave!=7 ){
				echo "<td>".$dato."</td>";
			}
        
			if($llave==7){ 
            
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