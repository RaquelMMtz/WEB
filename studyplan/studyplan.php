<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos de la tabla studyplan
$sql = "SELECT idStudyPlan,nameStudyPlan, code, duration, credits, idCareer FROM studyplan WHERE Status = 1";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planes de Estudio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Planes de Estudio</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Duración</th>
                    <th>Créditos</th>
                    <th>ID Carrera</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameStudyPlan']; ?></td>
                        <td><?php echo $row['code']; ?></td>
                        <td><?php echo $row['duration']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['idCareer']; ?></td>
                        <td>
                            <form action="eliminar_studyplan.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idStudyPlan']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarStudyPlan.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idStudyPlan']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormStudyPlan.php" class="btn btn-success">Nuevo Plan de Estudio</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
