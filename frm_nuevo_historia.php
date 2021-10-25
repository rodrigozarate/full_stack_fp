<?php session_start();?>
<?php if(isset($_SESSION['seudonimo_usuario']) & $_SESSION['valido']==1 & $_SESSION['tipo_usuario']>=0){
	include_once('inclusion.php');
	}else{
		exit();
	}
?>

<div class="container-fluid">
<form action="sistema.php?panel=historia" method="post" enctype="multipart/form-data" name="historia">

	<div class="row py-1">
        <div class="col-4">
        <label>Historia</label>
        </div>
        <div class="col-8">
        <input name="nombre_historia" required type="text" value="">
        </div>
    </div>
    
    <div class="row py-1">
        <div class="col-4">
        <label>Proyecto</label>
        </div>
        <div class="col-8">
        <select name="id_proyecto_historia" required="required" >
            <option value=""  >-----</option>
            <?php 
            $pregunta = new consultaProyecto;
            $listaProyecto = $pregunta->listarProyectos($conexion);
            
            foreach ($listaProyecto as $clave => $valor) {
           
                if ($_SESSION['tipo_usuario']==5){
                    echo "<option value=\"".$valor[0]."\">".$valor[1]."</option>";
                }else{
                   if($_SESSION['company_usuario'] == $valor[2]){
                    echo "<option value=\"".$valor[0]."\">".$valor[1]."</option>";
                    }
                }
            }

            ?>
            </select> 
        </div>
    </div>
    
   <div class="row py-1">
        <div class="col-4">
        <label>Ticket</label>
        </div>
        <div class="col-8">
        <input name="nombre_ticket" required type="text" value="">
        </div>
    </div>
    
       <div class="row py-1">
        <div class="col-4">
        <label>Comentarios Ticket</label>
        </div>
        <div class="col-8">
            <textarea name="comentarios_ticket" required></textarea>
        </div>
    </div>

    <input name="nuevo" type="hidden" value="historia_4" />
    <input name="registro" type="hidden" value="h4" />
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
