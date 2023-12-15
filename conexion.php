<?php
$host = 'localhost'; // Cambiar si es necesario
$db = 'areaservices'; // Cambiar al nombre de tu base de datos
$user = 'root'; // Cambiar al usuario de la base de datos
$password = ''; // Cambiar a la contraseña de la base de datos

$conexion = mysqli_connect($host, $user, $password, $db);

// Verificar si hubo un error en la conexión
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
