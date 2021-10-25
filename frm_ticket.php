<?php session_start(); ?>
<?php if(isset($_SESSION['seudonimo_usuario']) && $_SESSION['valido']==1){
	
	$q_dato=$_GET['dt'];
	// aqui hay que obtener el id del vínculo
    // echo " -- ".$q_dato." -- ";
	}else{
		echo "no hay sesion";
		exit();
	}
?>
<?php

include_once('inclusion.php');
$datos = new consultaHstoria;
$respuesta = $datos->consultarHistoria($q_dato,$conexion);
$arrayDatos = array();
foreach($respuesta as $dato){
	$arrayDatos[] = $dato;
	}

?>
<div class="container-fluid">
<form action="sistema.php?panel=historia" method="post" enctype="multipart/form-data" name="historia">

<div class="row py-1">
    <div class="col-4">
    <label>Historia</label>
    </div>
    <div class="col-8">
    <input name="nombre_historia" required type="text" value="<?php echo $arrayDatos[0]; ?>">
    </div>
</div>  
 

<div class="row py-1">
    <div class="col-4">
        <label>Proyecto</label>
    </div>
    <div class="col-8">
        <select name="id_proyecto_historia" required >
            <option value="">----</option>
        <?php 
            $preguntapry = new consultaProyecto;
            $listaProyecto = $preguntapry->listarProyecto($conexion);
            foreach ($listaProyecto as $clave => $valor) {
                if($_SESSION['company_usuario'] == $arrayDatos[1]){
                echo "<option";
                  if ($arrayDatos[1] == $valor[0]){
                    echo " selected=\"selected\" ";
                  }
                echo " value=\"".$valor[0]."\" >".$valor[1]."</option>";
                }
            }
            ?>
        </select>
    </div>
</div>    
   
    <input name="edicion" type="hidden" value="historia_3" />

    <input name="registro" type="hidden" value="<?php echo $q_dato; ?>" />
    
    <div class="row py-2">
        <div class="col">
        <input class="btn btn-success" name="Guardar" type="submit" value="Enviar" />
        </div>
        <div class="col-4">
        <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Cancelar</span>
        </button>
        </div>
    </div>

</form>
</div>

