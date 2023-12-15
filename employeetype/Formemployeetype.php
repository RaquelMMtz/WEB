<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar EmployessType</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar EmployessType</h2>
    <form action="insertar_employeetype.php" method="POST">
                <div>
                  
                         <label for="nameEmployeeType">nameEmployeeType:</label>
                         <input class="form-control" type="text"  name="nameEmployeeType" id="nameEmployeeType">
                    </div>
                    <div class="form-group">
                        <label for="baseSalary">baseSalary:</label>
                        <input class="form-control" type="text"  name="baseSalary" id="baseSalary">
                    </div>
                    <div class="form-group">
                        <label for="hoursEmployeeType">hoursEmployeeType:</label>
                        <input class="form-control" type="text"  name="hoursEmployeeType" id="hoursEmployeeType">
                    </div>
                <br>
      <button type="submit" class="btn btn-primary">Insertar</button>
      
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
