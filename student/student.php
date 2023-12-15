<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos de la tabla student
$sql = "SELECT idStudent, nameStudent, lastnameStudent, registrationNumber, rfc, curp, nss, addressStudent, email, numberphone FROM student WHERE Status = 1";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Estudiantes</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Número de Registro</th>
                    <th>RFC</th>
                    <th>CURP</th>
                    <th>NSS</th>
                    <th>Dirección</th>
                    <th>Correo Electrónico</th>
                    <th>Número de Teléfono</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameStudent']; ?></td>
                        <td><?php echo $row['lastnameStudent']; ?></td>
                        <td><?php echo $row['registrationNumber']; ?></td>
                        <td><?php echo $row['rfc']; ?></td>
                        <td><?php echo $row['curp']; ?></td>
                        <td><?php echo $row['nss']; ?></td>
                        <td><?php echo $row['addressStudent']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['numberphone']; ?></td>
                        <td>
                            <form action="eliminar_student.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idStudent']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarStudent.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idStudent']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormStudent.php" class="btn btn-success">Nuevo Estudiante</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
