<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="sistema.php">
        <div class="sidebar-brand-icon" ><img src="icon/logo.png" height="30"></div> <div class="sidebar-brand-text mx-3" ><?php echo $q_cliente; ?></div>
        </a>
            <li class="nav-item">
            
            <a class="nav-link" href="sistema.php?panel=inicio">
            <i class="fas fa-fw fa-table"></i>
            <span>Historial</span></a>
            </li>
            
            <hr class="sidebar-divider">
           
             <?php if($_SESSION['tipo_usuario']==5){
				 // inserta los otros items de menu
				 ?>
                 
                 <li class="nav-item"><a  class="nav-link" href="sistema.php?panel=company">
                 <i class="fas fa-fw fa-landmark"></i>
                 Compañía</a></li>
             
             <li class="nav-item"><a  class="nav-link" href="sistema.php?panel=usuarios">
             <i class="fas fa-fw fa-address-card"></i>
             Usuarios</a></li>
    
                 
                 <?php
				 // final de insercion para admin
				 } ?>
    
    
                 <?php if($_SESSION['tipo_usuario']>=3){
				 // inserta los otros items de menu
				 ?>
                 <li class="nav-item">
                <a  class="nav-link" href="sistema.php?panel=proyecto">
             <i class="fas fa-fw fa-project-diagram"></i>
             Proyectos</a></li>
    
                 <?php
				 // final de insercion para developer o superior
				 } ?>
    
    
             <li class="nav-item"><a  class="nav-link" href="sistema.php?panel=historia">
             <i class="fas fa-fw fa-edit"></i>
             Historias</a></li>
             
    
            <li class="nav-item"><a  class="nav-link" href="sistema.php?panel=ticket"><i class="fas fa-fw fa-tasks"></i>
             Ticket</a></li>
             <hr class="sidebar-divider">
             
            <li class="nav-item"><a class="nav-link" href="index.php?salida=srv">
            <i class="fas fa-fw fa-times"></i>
            Salir</a></li>
            
            <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
    
    <div class="text-center d-none d-md-inline">
    
    <?php
      if($_SESSION['tipo_usuario'] == '0'){
        include('company_brand.php');
      }
    ?>
    </div>        
</ul>
