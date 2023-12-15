<?php
// Conexión a la base de datos
require '../conexion.php';
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Actualizar el registro cambiando su estado a "inactivo"
    $sql = "UPDATE studyplan SET status = 0 WHERE idStudyPlan = $id";
    if ($conexion->query($sql) === TRUE) {
        echo "Eliminada correctamente.";
        header("refresh:2; url=studyplan.php");
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
