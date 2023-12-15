<?php
// Obtener los datos del formulario
$numberLoan = $_POST["numberLoan"];
$descriptionLoanAplication = $_POST["descriptionLoanAplication"];
$deliveryDate = $_POST["deliveryDate"];
$departureDate = $_POST["departureDate"];
$quantity = $_POST["quantity"];
$idStudent = $_POST["idStudent"];
$idAuthorization = $_POST["idAuthorization"];
$idEmployee = $_POST["idEmployee"];
$idToolCatalog = $_POST["idToolCatalog"];
$idBookCatalog = $_POST["idBookCatalog"];

$status=1;


require '../conexion.php';
// Insertar el loanaplication en la tabla
$sql = "INSERT INTO loanaplication (numberLoan,descriptionLoanAplication,deliveryDate,departureDate,quantity,idBookCatalog,idStudent,idAuthorization,idEmployee,idToolCatalog,status) VALUES 
('$numberLoan','$descriptionLoanAplication','$deliveryDate', '$departureDate','$quantity','$idBookCatalog','$idStudent','$idAuthorization','$idEmployee','$idToolCatalog','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a loanaplication.php con un mensaje de éxito
    header("Location: loanaplication.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar Area: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
