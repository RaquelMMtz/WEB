<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consultas select a la base de datos,en este caso a las 2 tablas
$selectidArea = mysqli_query($conexion,"SELECT idArea,nameArea  FROM area");


?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Areas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Area</h2>
    <form action="insertar_toolcatalog.php" method="POST">
 
                    <div>
                         <label for="nameToolCatalog">nameToolCatalog:</label>
                         <input class="form-control" type="text"  name="nameToolCatalog" id="nameToolCatalog">
                    </div>

                    <div class="form-group">
                        <label for="number">brand:</label>
                        <input class="form-control" type="text"  name="brand" id="brand">
                    </div>

                    <div class="form-group">
                        <label for="model">model:</label>
                        <input class="form-control" type="text"  name="model" id="model">
                    </div>

                    <div class="form-group">
                        <label for="quantityExistence">quantityExistence:</label>
                        <input class="form-control" type="text"  name="quantityExistence" id="quantityExistence">
                    </div>

                    <div class="form-group">
                        <label for="descriptionToolCatalog">descriptionToolCatalog:</label>
                        <input class="form-control" type="text"  name="descriptionToolCatalog" id="descriptionToolCatalog">
                    </div>

                    <label for="cmbAreAType" class="form-label">AreaType</label>
        <select name="idArea" id="idArea" class="form-control">
            <?php
            while ($datos = mysqli_fetch_array($selectidArea)) {
                ?>
                <option value="<?php echo $datos['idArea'] ?>"> <?php echo $datos['nameArea'] ?> </option>
                <?php
            }
            ?>
        </select>
             
      <button type="submit" class="btn btn-primary">Insertar</button>
      
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
