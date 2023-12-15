<?php
// Obtener los datos del formulario

$nameStudent = $_POST["nameStudent"];
$lastnameStudent = $_POST["lastnameStudent"];
$registrationNumber = $_POST["registrationNumber"];
$rfc = $_POST["rfc"];
$curp = $_POST["curp"];
$nss = $_POST["nss"];
$addressStudent = $_POST["addressStudent"];
$email = $_POST["email"];
$numberphone = $_POST["numberphone"];
$idStudyPlan = $_POST["idStudyPlan"];
$status=1;
 
require '../conexion.php';
// Insertar el student en la tabla
$sql = "INSERT INTO student (nameStudent,lastnameStudent,registrationNumber,rfc,curp,nss,addressStudent,email,numberphone,idStudyPlan,status) VALUES 
('$nameStudent','$lastnameStudent','$registrationNumber','$rfc','$curp','$nss','$addressStudent','$email','$numberphone','$idStudyPlan','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a student.php con un mensaje de éxito
    header("Location: student.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar student: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
