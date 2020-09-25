<?php
//Recibir datos del formulario(datos de las demás columnas de la bd)
$nombre_contenido = $_POST['nombre_contenido'];
$descripcion_contenido = $_POST['descripcion_contenido'];
//Recibimos los datos del formulario(datos propios de la imagen)
$nombre_imagen = $_FILES['imagen']['name'];
$tipo_imagen = $_FILES['imagen']['type'];
$tamanho_imagen = $_FILES['imagen']['size'];

//Ruta del destino en servidor
$destino = $_SERVER['DOCUMENT_ROOT'] . '/huella/img/trabajos/';
$ruta = $destino . $nombre_imagen;
if ($tamanho_imagen <= 5000000) {
    if ($tipo_imagen == "image/jpg" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
//Movemos la imagen del directorio temporal al directorio escogido
        move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . $nombre_imagen);
    } else {
        echo "Solo se admiten los formatos de imagen JPG,JPEG,PNG y GIF";
    }
} else {
    echo "El tamaño no debe ser mayor a 5 MB";
}

include_once '../Conexion.inc.php';
Conexion::abrirConexion();
$sql = "INSERT INTO trabajos (Nombre,Descripcion,Ruta,Tipo) VALUES (:nombre,:descripcion,:ruta,:tipo)";
$conexion = Conexion::obtenerConexion();
$sentencia = $conexion->prepare($sql);
$sentencia->bindParam(':nombre', $nombre_contenido, PDO::PARAM_STR);
$sentencia->bindParam(':descripcion', $descripcion_contenido, PDO::PARAM_STR);
$sentencia->bindParam(':ruta', $ruta);
$sentencia->bindParam(':tipo', $tipo_imagen);

try {
    $sentencia->execute();
    echo 'Se ha insertado exitosamente el contenido en la bd';
} catch (PDOException $e) {
    echo 'ERROR' . $e->getMessage();
}
Conexion::cerrarConexion();
?>