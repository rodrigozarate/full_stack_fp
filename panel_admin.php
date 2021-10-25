<div id="content-wrapper" class="d-flex flex-column">
	<div class="panel_admin">
        
        
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


<?php 
 if($_SESSION['tipo_usuario']=='5'){   
    
    if($_GET['panel']=='usuarios'){
echo "<a data-toggle=\"modal\" data-target=\"#modalNuevo\" data-titulo=\"Nuevo usuario\" class=\"btn btn-success btn-icon-split\" data-ubicacion=\"frm_nuevo_usuario.php\" href=\"#\"><span class=\"icon \"><i class=\"fas fa-plus-square\"></i></span><span class=\"text\">Nuevo usuario</span></a>";
    }
}?> 
            
<?php 
    if($_SESSION['tipo_usuario']=='5'){
    
    if($_GET['panel']=='company'){	
echo "<a data-toggle=\"modal\" data-target=\"#modalNuevo\" data-titulo=\"Nueva Compañía\" class=\"btn btn-success btn-icon-split\" data-ubicacion=\"frm_nuevo_company.php\" href=\"#\"><span class=\"icon \"><i class=\"fas fa-plus-square\"></i></span><span class=\"text\">Compañía</span></a>";	
    }
}?> 

<?php 
    if($_SESSION['tipo_usuario']>='3'){
    
    if($_GET['panel']=='proyecto'){
echo "<a data-toggle=\"modal\" data-target=\"#modalNuevo\" data-titulo=\"Nuevo Proyecto\" class=\"btn btn-success btn-icon-split\" data-ubicacion=\"frm_nuevo_proyecto.php\" href=\"#\"><span class=\"icon \"><i class=\"fas fa-plus-square\"></i></span><span class=\"text\">Proyecto</span></a>";
    }
}?>         

<?php    if($_GET['panel']=='historia'){
echo "<a data-toggle=\"modal\" data-target=\"#modalNuevo\" data-titulo=\"Nueva Historia\" class=\"btn btn-success btn-icon-split\" data-ubicacion=\"frm_nueva_historia.php\" href=\"#\"><span class=\"icon \"><i class=\"fas fa-plus-square\"></i></span><span class=\"text\">Historia</span></a>";
    }?>

<?php if($_GET['panel']=='ticket'){
echo "<a data-toggle=\"modal\" data-target=\"#modalNuevo\"  data-titulo=\"Nuevo Ticket\" class=\"btn btn-success btn-icon-split\" data-ubicacion=\"frm_nuevo_ticket.php\" href=\"#\"><span class=\"icon \"><i class=\"fas fa-plus-square\"></i></span><span class=\"text\">Ticket</span></a>";
}?>

            
         <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nombre_usuario"]; ?></span>
                <img class="img-profile rounded-circle" src="icon/person.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?salida=srv">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>
         </ul>
</nav>
            
       
        <div class="container-fluid">
        <?php
		if(isset($_GET['panel'])){
			
			 $q_panel = $_GET['panel'];
        switch ($q_panel) {     
            case "inicio":
                include('bloque_inicio.php');
                break;
			case "usuarios":
                include('bloque_usuarios.php');
                break;
            case "company":
                include('bloque_company.php');
                break;
			case "historia":
                include('bloque_historia.php');
                break;
            case "proyecto":
                include('bloque_proyectos.php');
                break;
			case "tickets":
                include('bloque_tickets.php');
                break;
		

        			}
				
			}
       
        ?>
        </div>
        <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
           <span>Derechos reservados 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
<div>