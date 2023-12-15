<?php
// Obtener los datos del formulario
$nameToolCatalog = $_POST["nameToolCatalog"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$quantityExistence = $_POST["quantityExistence"];
$descriptionToolCatalog = $_POST["descriptionToolCatalog"];
$idArea = $_POST["idArea"];
$status=1;


require '../conexion.php';
// Insertar el toolcatalog en la tabla
$sql = "INSERT INTO toolcatalog (nameToolCatalog, brand,model,quantityExistence,descriptionToolCatalog,idArea,status) VALUES 
('$nameToolCatalog','$brand','$model','$quantityExistence','$descriptionToolCatalog','$idArea','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a toolcatalog.php con un mensaje de éxito
    header("Location: toolcatalog.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar toolcatalog: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
