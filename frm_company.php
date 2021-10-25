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
$datos = new consultaCompany;
$respuesta = $datos->consultarCompany($q_dato,$conexion);
$arrayDatos = array();
foreach($respuesta as $dato){
	$arrayDatos[] = $dato;
	}

?>
<div class="container-fluid">
<form action="sistema.php?panel=company" method="post" enctype="multipart/form-data" name="company">

<div class="row py-1">
    <div class="col-4">
    <label>Nombre Compañía</label>
    </div>
    <div class="col-8">
    <input name="nombre_company" required type="text" value="<?php echo $arrayDatos[0]; ?>">
    </div>
</div>  
 
<div class="row py-1">
    <div class="col-4">
    <label>NIT</label>
    </div>
    <div class="col-8">
    <input name="nit_company" required type="text"  value="<?php echo $arrayDatos[1]; ?>">
    </div>
</div>    
    
<div class="row py-1">
    <div class="col-4">
    <label>Teléfono</label>
</div>
    <div class="col-8">
    <input name="telefono_company" required type="text" value="<?php echo $arrayDatos[2]; ?>">
    </div>
</div>

    
<div class="row py-1">
    <div class="col-4">
    <label>e-mail</label>
</div>
    <div class="col-8">
    <input name="email_company" type="text" required value="<?php echo $arrayDatos[3]; ?>">
    </div>
</div> 
   
    <input name="edicion" type="hidden" value="company_3" />

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

