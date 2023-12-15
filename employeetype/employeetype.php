<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos de la tabla employeetype
$sql = "SELECT idEmployeeType,nameEmployeeType, baseSalary, hoursEmployeeType FROM employeetype WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tipos de Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tipos de Empleado</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre del Tipo de Empleado</th>
                    <th>Salario Base</th>
                    <th>Horas del Tipo de Empleado</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameEmployeeType']; ?></td>
                        <td><?php echo $row['baseSalary']; ?></td>
                        <td><?php echo $row['hoursEmployeeType']; ?></td>
                        <td>
                            <form action="eliminar_employeetype.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idEmployeeType']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarEmployeetype.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idEmployeeType']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormEmployeetype.php" class="btn btn-success">Nuevo Tipo de Empleado</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
