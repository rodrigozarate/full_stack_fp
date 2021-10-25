<?php session_start();?>
<?php if(isset($_SESSION['seudonimo_usuario']) & $_SESSION['valido']==1 & $_SESSION['tipo_usuario']==5){
	
	}else{
		exit();
	}
?>

<div class="container-fluid">
<form action="sistema.php?panel=company" method="post" enctype="multipart/form-data" name="usuario">

	<div class="row py-1">
        <div class="col-4">
        <label>Compañía</label>
        </div>
        <div class="col-8">
        <input name="nombre_company" required type="text" value="">
        </div>
    </div>
    <div class="row py-1">
        <div class="col-4">
        <label>NIT</label>
        </div>
        <div class="col-8">
        <input name="nit_company" required type="text"  value="">
        </div>
    </div>
    <div class="row py-1">
        <div class="col-4">
        <label>Teléfono</label>
        </div>
        <div class="col-8">
        <input name="telefono_company" required type="text"  value="">
        </div>
    </div>


    <div class="row py-1">
        <div class="col-4">
        <label>e-mail</label>
        </div>
        <div class="col-8">
        <input name="email_company" required type="text"  value="" >
        </div>
    </div>

    <input name="nuevo" type="hidden" value="company_4" />
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
