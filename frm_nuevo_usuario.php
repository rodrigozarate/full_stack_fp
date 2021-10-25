<?php session_start();?>
<?php if(isset($_SESSION['seudonimo_usuario']) & $_SESSION['valido']==1 & $_SESSION['tipo_usuario']==5){
	include('inclusion.php');
	}else{
		exit();
	}
?>

<div class="container-fluid">
<form action="sistema.php?panel=usuarios" method="post" enctype="multipart/form-data" name="usuario">
    
  <div class="row py-1">
        <div class="col-4">
        <label>Compañía</label>
        </div>
        <div class="col-8">
        <select name="company_usuario" required >
            <option value=""  >-----</option>
            <?php 
            $pregunta = new consultaCompany;
            $listaCompany = $pregunta->listarCompany($conexion);
            foreach ($listaCompany as $clave => $valor) {
                echo "<option value=\"".$valor[0]."\">".$valor[1]."</option>";
            }
            ?>
            </select> 
        </div>
    </div>

	<div class="row py-1">
        <div class="col-4">
        <label>Correo</label>
        </div>
        <div class="col-8">
        <input name="correo_usuario" required type="text" value="">
        </div>
    </div>
    <div class="row py-1">
        <div class="col-4">
        <label>Nombre</label>
        </div>
        <div class="col-8">
        <input name="nombre_usuario" required type="text"  value="">
        </div>
    </div>
    <div class="row py-1">
        <div class="col-4">
        <label>Identificación</label>
        </div>
        <div class="col-8">
        <input name="identificacion_usuario" required type="number"  value="">
        </div>
    </div>
    <div class="row py-1">
        <div class="col-4">
        <label>Estado</label>
        </div>
        <div class="col-8">
          <select name="estado_usuario" required >
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
        <select name="tipo_usuario" required >
        <option value="0">Consulta</option>
        <option value="3">Desarrollador</option>
        <option value="5">Administrador</option>
        </select> 
        </div>
    </div>
    <div class="row py-1">
        <div class="col-4">
        <label>Seudónimo</label>
        </div>
        <div class="col-8">
        <input name="n_seudonimo_usuario" required type="text"  value="" >
        </div>
    </div>
    <div class="row py-1">
        <div class="col-4">
        <label>Clave</label>
        </div>
        <div class="col-8">
        <input name="n_clave_usuario" required type="password"  value="">
        </div>
    </div>
     <div class="row py-1">
         <div class="col-4">
        <label>Nacimiento</label>
        </div>
        <div class="col-8">A
        <select name="nacimiento_usuario_a">
          <?php
          for($i=1940;$i<2050;$i++){
                  echo "<option value=\"".$i."\">".$i."</option>";
              }
          ?>
        </select> M 
        <select name="nacimiento_usuario_m">
          <?php
          for($i=1;$i<13;$i++){
              if(strlen($i)==1){
                  echo "<option value=\"0".$i."\">0".$i."</option>";
                  }else{
                  echo "<option value=\"".$i."\">".$i."</option>";
                  }
              }
          ?>
        </select> D 
        <select name="nacimiento_usuario_d">
          <?php
          for($i=1;$i<32;$i++){
              if(strlen($i)==1){
                  echo "<option value=\"0".$i."\">0".$i."</option>";
                  }else{
                  echo "<option value=\"".$i."\">".$i."</option>";
                  }
              }
          ?>
        </select>
        </div>
    </div>
    <input name="nuevo" type="hidden" value="7" />
    <input name="registro" type="hidden" value="" />
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
