<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");


// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos de la tabla toolcatalog
$sql = "SELECT idToolCatalog,nameToolCatalog, brand, model, quantityExistence, descriptionToolCatalog FROM toolcatalog WHERE Status = 1";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Herramientas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Catálogo de Herramientas</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cantidad en Existencia</th>
                    <th>Descripción</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameToolCatalog']; ?></td>
                        <td><?php echo $row['brand']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['quantityExistence']; ?></td>
                        <td><?php echo $row['descriptionToolCatalog']; ?></td>
                        <td>
                            <form action="eliminar_toolcatalog.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idToolCatalog']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editar_toolcatalog.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idToolCatalog']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormToolCatalog.php" class="btn btn-success">Nueva Herramienta</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
