 <?php
    $id = $_SESSION['id'];
    
    $query1 = "SELECT * FROM `user` WHERE `id` = '$id'";
    $result_object1 = mysqli_query($conn, $query1);
    $user_data = mysqli_fetch_assoc($result_object1);
    
    $sql_brgy = "SELECT * from tbl_brgy order by brgy";
    $result_brgy = mysqli_query($conn, $sql_brgy);
    
    $sqlinc = "SELECT * from incident_type order by inc_type";
    $resultinc = mysqli_query($conn, $sqlinc);
    
    
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
          <img src="dist/img/logo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user_data['pos'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2"> 
          
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
         <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Barangay
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <?php
                while($row = mysqli_fetch_array($result_brgy))  
                    { ?>
                    <li class="nav-item">
                    <a href="brgy_record.php?id=<?php echo $row['id'];?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php 
                      echo $row['brgy'];
                      ?></p>
                    </a>
                  </li>
                    <?php
                    }?>
                    <li class="nav-item">
                    <a href="add_brgy.php" class="nav-link">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>Add Barangay</p>
                    </a>
                  </li>
             
            </ul>
          </li>  
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Incident Type
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <?php
                while($row = mysqli_fetch_array($resultinc))  
                    { ?>
                    <li class="nav-item">
                    <a href="inc_type_record.php?id=<?php echo $row['id'];?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php 
                      echo $row['inc_type'];
                      ?></p>
                    </a>
                  </li>
                    <?php
                    }?>
                    <li class="nav-item">
                    <a href="add_inc_type.php" class="nav-link">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>Add Incident Type</p>
                    </a>
                  </li>
             
            </ul>
          </li> 
          <li class="nav-item">
            <a href="date_filter.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Report
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="add_user.php" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="update_admin.php" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-arrow-right" aria-hidden="true"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
           
            
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>