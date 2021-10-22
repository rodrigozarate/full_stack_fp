<div id="cargacss" class="cargacss"></div>
<span id="span1" class="oculto"></span>
<span id="span2" class="oculto"></span>
<span id="span3" class="oculto"></span>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  
<script src="vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>

  <!-- Page level custom scripts -->
  <script src="js/carga-tabla.js"></script>

  </div>
</body>
</html>


   <script>
   // se incluye el archivo php para que el div este disponible
   // La identificaion del div se pasa por jquery

$('#modalNuevo').on('show.bs.modal', function (event) {
	
	var button = $(event.relatedTarget)
	var ubicacion = button.data('ubicacion')
	var titulo = button.data('titulo')

	var modal = $(this)
  modal.find('.modal-title').text(titulo)
  
  	$( "#cuerpox" ).empty();
	$( "#cuerpox" ).load(ubicacion);

})
	
	
$('#modalEditar').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var idUsuario = button.data('idusuario') 
  var ubicacion = button.data('ubicacion') 
  var titulo = button.data('titulo')
  var direccionir=ubicacion+'='+idUsuario;
	var modal = $(this)
	modal.find('.modal-title').text(titulo)

	$.ajax(
	  direccionir, 
	  {
		  data: { dt : idUsuario },
		  dataType: "html",
		  success: function(data) {

			$( "#cuerpov" ).empty();
			$( "#cuerpov" ).append(data);
			
		  },
		  error: function() {
			alert('Hubo un error');
		  }
	   }
	);
})	
	

</script>