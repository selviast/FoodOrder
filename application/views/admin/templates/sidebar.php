 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('welcome');?>" class="brand-link">
      <img src="<?= base_url('assets/');?>dist/img/perpuskuLogo.png"
           alt="perpusku"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Restoran</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Pembayaran</li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('admin')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>            
          </li>

          <li class="nav-header ">KELOLA</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">            
              <i class="nav-icon fas fa-dolly"></i>
              <p>
                Makanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/makanan')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Tambah Data</p>
                </a>
              </li>                        
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">            
              <i class="nav-icon fas fa-book"></i>
              <p>
                Minuman
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/minuman')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Tambah Data</p>
                </a>
              </li>                                                  
            </ul>
          </li>          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">            
              <i class="nav-icon fas fa-table"></i>
              <p>
                Meja
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/meja')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Tambah Data</p>
                </a>
              </li>                                                  
            </ul>
          </li>          
        <br>
        <br>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('auth/logout')?>" class="nav-link active">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>