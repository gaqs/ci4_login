<body>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="index.html">Administración</a>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebar_toggle" href="#!"><i class="fas fa-bars"></i></button>
  <!-- Navbar Search-->
  <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
          <!--
          <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
          -->
      </div>
  </form>
  <!-- Navbar-->
  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span><?= substr( session()->get('name'), 0,1); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#!">Perfil</a></li>
              <li><a class="dropdown-item" href="#!">Log de Actividad</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout_modal" href="#">Logout</a></li>
          </ul>
      </li>
  </ul>
</nav>

<div id="sidenav">

  <div id="sidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
              <div class="nav">
                  <div class="sb-sidenav-menu-heading">Core</div>
                  <a class="nav-link" href="index.html">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      Dashboard
                  </a>
                  <div class="sb-sidenav-menu-heading">Interface</div>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                      <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                      Menu 1
                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="#">Submenu 1</a>
                          <a class="nav-link" href="#">Submenu 2</a>
                      </nav>
                  </div>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                      <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                      Menu 2
                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                              Submenu 1
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                              <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="#">Lista 1</a>
                                  <a class="nav-link" href="#">Lista 2</a>
                                  <a class="nav-link" href="#">Lista 3</a>
                              </nav>
                          </div>
                          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                              Submenu 2
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                              <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="#">Lista 1</a>
                                  <a class="nav-link" href="#">Lista 2</a>
                                  <a class="nav-link" href="#">Lista 3</a>
                              </nav>
                          </div>
                      </nav>
                  </div>
                  <div class="sb-sidenav-menu-heading">Addons</div>
                  <a class="nav-link" href="charts.html">
                      <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                      Graficos
                  </a>
                  <a class="nav-link" href="tables.html">
                      <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                      Tablas
                  </a>
              </div>
          </div>
          <div class="sb-sidenav-footer">
              <div class="small">Logeado como:</div>
              <?= session()->get('name').' '.session()->get('lastname')?>
          </div>
      </nav>
  </div> <!-- /end layoutSidenav_nav  -->


  <!-- Modal confirmacion de cierre de sesion -->
  <div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="logout_modal_label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logout_modal_label">Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close" name="button"></button>
        </div>
        <div class="modal-body">
          ¿Está seguro que desea cerrar su sesión actual?
        </div>
        <div class="modal-footer">
          <a href="<?= base_url('users/logout');?>">
            <button type="button" class="btn btn-primary" name="button"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
          </a>
        </div>
      </div>
    </div>
  </div>
