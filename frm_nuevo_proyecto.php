<?php session_start();?>
<?php if(isset($_SESSION['seudonimo_usuario']) & $_SESSION['valido']==1 & $_SESSION['tipo_usuario']>=3){
	include_once('inclusion.php');
	}else{
		exit();
	}
?>

<div class="container-fluid">
<form action="sistema.php?panel=proyecto" method="post" enctype="multipart/form-data" name="proyecto">

	<div class="row py-1">
        <div class="col-4">
        <label>Nombre del proyecto</label>
        </div>
        <div class="col-8">
        <input name="nombre_proyecto" required type="text" value="">
        </div>
    </div>
    
    <div class="row py-1">
        <div class="col-4">
        <label>Compañía</label>
        </div>
        <div class="col-8">
        <select name="id_company_proyecto" required="required" >
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



    <input name="nuevo" type="hidden" value="proyecto_4" />
    <input name="registro" type="hidden" value="p4" />
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
