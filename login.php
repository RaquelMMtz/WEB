<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AreaServices";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta para verificar las credenciales
$sql = "SELECT * FROM User WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    echo "¡Inicio de sesión exitoso!";
    
    // Aquí podrías redirigir a otra página o establecer una sesión de usuario
} else {
    // Error en las credenciales
    echo "Credenciales inválidas. Por favor, inténtalo nuevamente.";
}

// Cerrar la conexión
$conn->close();
?>
