<?php

//Info de la base de datos
define('NOMBRE_SERVIDOR','localhost');
define('NOMBRE_USUARIO','root');
define('PASSWORD','');
define('NOMBRE_BD','huella');

//Rutas de la web
define('SERVIDOR','http://localhost/huella');
define('RUTA_REGISTRO',SERVIDOR.'/registro.php');
define('RUTA_REGISTRO_CORRECTO',SERVIDOR.'/registro-correcto.php');
define('RUTA_LOGIN',SERVIDOR.'/login.php');
define('RUTA_LOGOUT',SERVIDOR.'/logout.php');
define('RUTA_SHOP',SERVIDOR.'/shop.php');
define('RUTA_SERVICIOS',SERVIDOR.'/servicios.php');

//Rutas de administrador
define('CONTENIDO_MANAGER',SERVIDOR.'/index_manager.php');
define('SHOP_MANAGER',SERVIDOR.'/shop_manager.php');
define('SERVICIOS_MANAGER',SERVIDOR.'/servicios_manager.php');