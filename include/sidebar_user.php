<?php

?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">CDRRMO San Carlos City</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $brgy_data['brgy'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2"> 
          
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
         <li class="nav-item">
            <a href="user.php" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                Add Incidents
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="brgy_inc.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Incidents Record
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-arrow-right"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          </li>  
            
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>