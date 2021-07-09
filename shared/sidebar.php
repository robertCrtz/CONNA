<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="pag_inicio.php">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                    </div>Menú Principal
                </a>


                <?php //if($id_rol == 2) { ?>
                <div class="sb-sidenav-menu-heading">Control</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-book-open"></i>
                    </div>Casos
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../vistas/agregar.php">Agregar Caso</a>
                        <a class="nav-link">Eliminar Caso</a>
                    </nav>
                </div>
                <?php// } ?>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcogimiento" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                    </div>Acogimiento
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseAcogimiento" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../vistas/tipoAcogimiento.php">Tipos de acogimiento</a>
                    </nav>
                </div>
                

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users"></i>
                        </div>Administrar Usuarios
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="registro_usuario.php">Agregar Usuario</a>
                        <a class="nav-link" href="lista_usuarios.php">Listado de usuarios</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="../vistas/graficas.php">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-table"></i>
                        </div>Tables
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Ingresado como:
            </div>
            <?php echo $_SESSION["usuario"];?>
        </div>
    </nav>
</div>