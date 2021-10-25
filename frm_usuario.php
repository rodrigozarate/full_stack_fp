<?php session_start(); ?>
<?php if(isset($_SESSION['seudonimo_usuario']) && $_SESSION['valido']==1){
	
	$q_user=$_GET['dt'];
	// aqui hay que obtener el id del vínculo
	// echo ($q_user." lusuario");
	}else{
		echo "no hay sesion";
		exit();
	}
?>
<?php

include_once('inclusion.php');
$datos = new consultaUsuario;
$respuesta = $datos->consultarUsuario($q_user,$conexion);
$arrayDatos = array();
foreach($respuesta as $dato){
	$arrayDatos[] = $dato;
	}

?>
<div class="container-fluid">
<form action="sistema.php?panel=usuarios" method="post" enctype="multipart/form-data" name="usuario">

<div class="row py-1">
    <div class="col-4">
    <label>Correo</label>
    </div>
    <div class="col-8">
    <input name="correo_usuario" required type="text" value="<?php echo $arrayDatos[0]; ?>">
    </div>
</div>  
 
<div class="row py-1">
    <div class="col-4">
    <label>Nombre</label>
    </div>
    <div class="col-8">
    <input name="nombre_usuario" required type="text"  value="<?php echo $arrayDatos[1]; ?>">
    </div>
</div>    
    
<div class="row py-1">
    <div class="col-4">
    <label>Identificación</label>
</div>
    <div class="col-8">
    <input name="identificacion_usuario" required type="number"  value="<?php echo $arrayDatos[2]; ?>">
    </div>
</div>

<div class="row py-1">
    <div class="col-4">
    <label>Estado</label>
    </div>
    <div class="col-8">
      <select name="estado_usuario" required>
        <option value="<?php echo $arrayDatos[3]; ?>"><?php 
		switch($arrayDatos[3]){
			case 0 :
				echo "Activo";
				break;
			case 1 :
				echo "Inactivo";
				break;
			case 2 :
				echo "Bloqueado";
				break;
			
			}
		
		?></option>
    <option value="0">Activo</option>
    <option value="1">Inactivo</option>
    <option value="2">Bloqueado</option>
    </select>  
    </div>
</div> 
    
<div class="row py-1">
    <div class="col-4">
    <label>Tipo</label>
</div>
    <div class="col-8">
    <select name="tipo_usuario" required>
    <option  value="<?php echo $arrayDatos[4]; ?>"><?php
    switch($arrayDatos[4]){
			case 0 :
				echo "Consulta";
				break;
			case 3 :
				echo "Desarrollador";
				break;
			case 5 :
				echo "Administrador";
				break;
			
			}
			?>
    </option>
    <option value="0">Consulta</option>
    <option value="3">Desarrollador</option>
    <option value="5">Administrador</option>
    </select> 
    </div>
</div> 

<div class="row py-1">
    <div class="col-4">
        <label>Compañía</label>
    </div>
    <div class="col-8">
        <select name="company_usuario" required >
        <?php 
            $preguntacmp = new consultaCompany;
            $listaCompany = $preguntacmp->listarCompany($conexion);
            foreach ($listaCompany as $clave => $valor) {
                echo "<option";
                if ($arrayDatos[6] == $valor[0]){
                    echo " selected=\"selected\" ";
                }
                echo " value=\"".$valor[0]."\" >".$valor[1]."</option>";
            }
            ?>
        </select>
    </div>
</div>

    
<div class="row py-1">
    <div class="col-4">
    <label>Seudónimo</label>
</div>
    <div class="col-8">
    <input name="seudonimo_muestra" type="text" readonly value="<?php echo $arrayDatos[5]; ?>">
    </div>
</div> 
   
    <input name="edicion" type="hidden" value="9u" />
    <input name="seudonimo_usuario" type="hidden" value="<?php echo $arrayDatos[5]; ?>" />
    <input name="registro" type="hidden" value="<?php echo $q_user; ?>" />
    
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
<hr>
<h3>Cambiar contraseña</h3>
<form action="sistema.php?panel=usuarios" method="post" enctype="multipart/form-data" name="clave">
<div class="row py-1">
    <div class="col-4">
    	<label>Contraseña</label>
    </div>
    <div class="col-8">
        <input name="clave" required type="password" value="" />
    </div>
</div>


<input name="edicion" type="hidden" value="5u" />
<input name="correo" type="hidden" value="<?php echo $arrayDatos[0]; ?>" />
<input name="seudonimo" type="hidden" value="<?php echo $arrayDatos[5]; ?>" />
<input name="registro" type="hidden" value="<?php echo $q_user; ?>" />
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

