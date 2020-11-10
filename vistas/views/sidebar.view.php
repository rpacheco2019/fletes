<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="registro.controller.php" class="brand-link">
      <img src="../vistas/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Spartan 1</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../vistas/dist/img/logonuevo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../controladores/destroy.controller.php" class="d-block">User: <?php echo $_SESSION['user'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="False">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- LI Menu FYM -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu FYM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../controladores/nuevoRegistro.controller.php" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Nuevo registro</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../controladores/registro.controller.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Ver registros</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-calculator nav-icon"></i>
                  <p>Calculador</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- LI Pago a proveedor -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Pago a proveedor
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!-- <a href="../controladores/nuevoPago.controller.php" class="nav-link"> -->
                <a href="#" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Nuevo Pago</p>
                </a>
              </li>
              <li class="nav-item">
                <!-- <a href="../controladores/pagos.controller.php" class="nav-link"> -->
                <a href="#" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Ver Pagos</p>
                </a>
              </li>
            <!--   <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-calculator nav-icon"></i>
                  <p>Calculador</p>
                </a>
              </li> -->
            </ul>
          </li>

          <!-- LI ODC -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Orden de compra
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Nueva ODC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Ver ODCs</p>
                </a>
              </li>
            <!--   <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-calculator nav-icon"></i>
                  <p>Calculador</p>
                </a>
              </li> -->
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
