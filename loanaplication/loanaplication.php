<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos de la tabla loanaplication
$sql = "SELECT idLoanAplication,numberLoan, descriptionLoanAplication, deliveryDate, departureDate, quantity FROM loanaplication WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitudes de Préstamo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Solicitudes de Préstamo</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Número de Préstamo</th>
                    <th>Descripción</th>
                    <th>Fecha de Entrega</th>
                    <th>Fecha de Salida</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['numberLoan']; ?></td>
                        <td><?php echo $row['descriptionLoanAplication']; ?></td>
                        <td><?php echo $row['deliveryDate']; ?></td>
                        <td><?php echo $row['departureDate']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>
                            <form action="eliminar_loanaplication.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idLoanAplication']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarLoanAplication.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idLoanAplication']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormLoanAplication.php" class="btn btn-success">Nueva Solicitud de Préstamo</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
