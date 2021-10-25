<?php session_start();?>
<?php if(isset($_SESSION['seudonimo_usuario']) & $_SESSION['valido']==1 & $_SESSION['tipo_usuario']>=0){
	include_once('inclusion.php');
    $q_company = $_SESSION['company_usuario'];
	}else{
		exit();
	}
?>

<div class="container-fluid">
<form action="sistema.php?panel=historia" method="post" enctype="multipart/form-data" name="historia">

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
        <label>Historia</label>
        </div>
        <div class="col-8">
        <select name="id_historia_ticket" required="required" >
            <option value=""  >-----</option>
            <?php 
            
            if ($_SESSION['tipo_usuario']==5){
                $pregunta = new consultaHistoria;
                $listaHistoria = $pregunta->listarHistorias($conexion);
                foreach ($listaHistoria as $clave => $valor) {
                 echo "<option value=\"".$valor[0]."\">".$valor[1]."</option>";
                }
            }else{
                $pregunta2 = new consultaHistoria;
                $listaHistoria2 = $pregunta2->listarHistoriasC($q_company, $conexion);
                foreach ($listaHistoria2 as $clave => $valor) {
                  echo "<option value=\"".$valor[0]."\">".$valor[1]."</option>";
                }
            }
            
            ?>
            </select> 
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



    <input name="nuevo" type="hidden" value="ticket_4" />
    <input name="estado_ticket" type="hidden" value="0" />
    <input name="registro" type="hidden" value="t4" />
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
