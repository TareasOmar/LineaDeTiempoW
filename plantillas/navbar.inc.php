<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';

Conexion :: abrirConexion();
$total_usuarios = RepositorioUsuario :: obtenerNumeroUsuarios(Conexion :: obtenerConexion());
Conexion :: cerrarConexion();
?>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button  type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Este botón despliega la barra de navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR    ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> INICIO</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo RUTA_SHOP ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> SHOP</a></li>
                <li><a href="<?php echo RUTA_SERVICIOS ?>"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> SERVICIOS</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (ControlSesion::sesionIniciada()) {
                    ?>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li class='dropdown'>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Gestor <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    Compras
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Comentarios
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Usuarios
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Favoritos
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_LOGOUT; ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesión
                        </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php
                            echo $total_usuarios;
                            ?>
                        </a>
                    </li>
                    <li><a href="<?php echo RUTA_LOGIN ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Iniciar Sesión</a></li>
                    <li><a href="<?php echo RUTA_REGISTRO ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Registrarse</a></li>
                        <?php
                    }
                    ?>     
            </ul>
        </div>
    </div>
</nav>
