<?php
// Obtener los datos del formulario
$nameEmployeeType = $_POST["nameEmployeeType"];
$baseSalary = $_POST["baseSalary"];
$hoursEmployeeType = $_POST["hoursEmployeeType"];
$status=1;

require '../conexion.php';
// Insertar el employeetype en la tabla
$sql = "INSERT INTO employeetype (nameEmployeeType,baseSalary,hoursEmployeeType,status) VALUES 
('$nameEmployeeType','$baseSalary','$hoursEmployeeType','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a employeetype.php con un mensaje de éxito
    header("Location: employeetype.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar employeetype: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
