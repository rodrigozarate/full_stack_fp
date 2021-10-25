<?php session_start(); ?>
<?php if(isset($_SESSION['seudonimo_usuario']) && $_SESSION['valido']==1){
	
	$q_dato=$_GET['dt'];
	// aqui hay que obtener el id del vínculo
	}else{
		echo "no hay sesion";
		exit();
	}
?>
<?php

include_once('inclusion.php');
$datos = new consultaTicket;
$respuesta = $datos->consultarTicket($q_dato,$conexion);
$arrayDatos = array();
foreach($respuesta as $dato){
	$arrayDatos[] = $dato;
	}

?>
<div class="container-fluid">
<form action="sistema.php?panel=ticket" method="post" enctype="multipart/form-data" name="ticket">

<div class="row py-1">
    <div class="col-4">
    <label>Ticket</label>
    </div>
    <div class="col-8">
    <input name="nombre_ticket" required type="text" value="<?php echo $arrayDatos[0]; ?>">
    </div>
</div>  
 
    <div class="row py-1">
        <div class="col-4">
        <label>Comentarios Ticket</label>
        </div>
        <div class="col-8">
            <textarea name="comentarios_ticket" required><?php echo $arrayDatos[1]; ?></textarea>
        </div>
    </div>

<div class="row py-1">
    <div class="col-4">
        <label>Estado</label>
    </div>
    <div class="col-8">
        <select name="estado_ticket" required >
            <option value="<?php echo $arrayDatos[2]; ?>" selected >
            <?php 
           switch($arrayDatos[2]){
               case 0:
                   echo "Abierto";
                   break;
               case 1:
                    echo "Desarrollo";
                   break;
               case 2:
                    echo "Cerrado";
                   break;
           }
            ?>
            
            </option>
            <option value="0" >Abierto</option>
            <option value="1" >Desarrollo</option>
            <option value="2" >Cerrado</option>

        </select>
    </div>
</div>    
   
    <input name="edicion" type="hidden" value="ticket_3" />
    <input name="id_historia_ticket" type="hidden" value="<?php echo $arrayDatos[3]; ?>" />

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

