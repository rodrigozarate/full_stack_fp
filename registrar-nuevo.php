<?php
include('inclusion.php');
include('header.php');
?>
<div class="container-fluid">
    <div id="paca">
        <div class="container">
            <div class="arriba-azul bg-gradient-primary">
            <a class="d-flex align-items-center justify-content-center" href="sistema.php">
            <div class="brand-icon" ><img src="icon/logo.png" height="30"></div>
                
                <div class="nombre-cliente" ><?php echo $q_cliente; ?></div>
                <div> <h1>Registro de usuario</h1> </div>
            </a>
            </div>
        </div>
        <div class="container">
            <p>Por favor diligencie todos los campos para poder registrarse en el sistema.</p>
        </div>
        <div class="container">
<form action="externo_crea_usuario.php?state=new" method="post" enctype="multipart/form-data" name="usuario">

    
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
        <label>Fecha de nacimiento</label>
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
    <input name="nuevo" type="hidden" value="registro_usuario" />
    <input name="registro" type="hidden" value="externo" />
    <input name="estado_usuario" type="hidden" value="0" />
    <input name="tipo_usuario" type="hidden" value="0" />
    <div class="row py-2">
        <div class="col">
        <input class="btn btn-success" name="Guardar" type="submit" value="Enviar" />
        </div>
        <div class="col-4">
        <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
            <a href="index.php" class="no-decoration"><span aria-hidden="true">Cancelar</span></a>
        </button>
        </div>
    </div>

    </form>
  </div>
 </div>
</div>
<?php
include('final.php');
?>
