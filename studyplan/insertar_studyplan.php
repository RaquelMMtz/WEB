<?php
// Obtener los datos del formulario

$nameStudyPlan = $_POST["nameStudyPlan"];
$code = $_POST["code"];
$duration = $_POST["duration"];
$credits = $_POST["credits"];
$idCareer = $_POST["idCareer"];
$status=1;


require '../conexion.php';
// Insertar el studyplan en la tabla
$sql = "INSERT INTO studyplan (nameStudyPlan,code,duration,credits,idCareer,status) VALUES 
('$nameStudyPlan','$code','$duration', '$credits','$idCareer', '$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a studyplan.php con un mensaje de éxito
    header("Location: studyplan.php?mensaje=studyplan insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar studyplan: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
