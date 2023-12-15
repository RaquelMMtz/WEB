<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consultas select a la base de datos,en este caso a las 2 tablas
$selectidAreaType = mysqli_query($conexion,"SELECT idAreaType,nameArea  FROM AreaType");
$selectidStudyPlan = mysqli_query($conexion,"SELECT idStudyPlan,nameStudyPlan  FROM StudyPlan");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar </h2>
    <form action="insertar_student.php" method="POST">
                <div>
                
                         <label for="nameStudent">nameStudent:</label>
                         <input class="form-control" type="text"  name="nameStudent" id="nameStudent">
                    </div>
                    <div class="form-group">
                        <label for="lastnameStudent">lastnameStudent:</label>
                        <input class="form-control" type="text"  name="lastnameStudent" id="lastnameStudent">
                    </div>
                    <div class="form-group">
                        <label for="registrationNumber">registrationNumber:</label>
                        <input class="form-control" type="text"  name="registrationNumber" id="registrationNumber">
                    </div>
                    <div class="form-group">
                        <label for="rfc">rfc:</label>
                        <input class="form-control" type="text"  name="rfc" id="rfc">
                    </div>
                    <div class="form-group">
                        <label for="curp">curp:</label>
                        <input class="form-control" type="text"  name="curp" id="curp">
                    </div>
                 
                    <div class="form-group">
                        <label for="nss">nss:</label>
                        <input class="form-control" type="text"  name="nss" id="nss">
                    </div>
                    <div class="form-group">
                        <label for="addressStudent">addressStudent:</label>
                        <input class="form-control" type="text"  name="addressStudent" id="addressStudent">
                    </div>
                    <div class="form-group">
                        <label for="email">email:</label>
                        <input class="form-control" type="text"  name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="numberphone">numberphone:</label>
                        <input class="form-control" type="text"  name="numberphone" id="numberphone">
                    </div>
                  
                    <label for="idStudyPlan">ToolCatalog:</label>
            <select name="idStudyPlan" id="idStudyPlan" class="form-control">
                <?php 
                while($employee = mysqli_fetch_array($selectidStudyPlan)) {
                    ?>
                    <option value="<?php echo $employee['idStudyPlan']; ?>"><?php echo $employee['nameStudyPlan']; ?></option>
                    <?php
                }
                ?>
            </select>
			   
                <br>
      <button type="submit" class="btn btn-primary">Insertar</button>
      
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
