<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consultas select a la base de datos,en este caso a las 2 tablas

$selectidCareer = mysqli_query($conexion,"SELECT idCareer,CareerName  FROM career");

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
    <form action="insertar_studyplan.php" method="POST">
                <div>
                
                         <label for="nameStudyPlan">nameStudyPlan:</label>
                         <input class="form-control" type="text"  name="nameStudyPlan" id="nameStudyPlan">
                    </div>
                    <div class="form-group">
                        <label for="code">code:</label>
                        <input class="form-control" type="text"  name="code" id="code">
                    </div>
                    <div class="form-group">
                        <label for="duration">duration:</label>
                        <input class="form-control" type="text"  name="duration" id="duration">
                    </div>
                    <div class="form-group">
                        <label for="credits">credits:</label>
                        <input class="form-control" type="text"  name="credits" id="credits">
                    </div>
                    <label for="cmbidCareer" class="form-label">Career</label>
               <select name="idCareer" id="idCareer" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidCareer))
                    {
                ?>
		        <option value="<?php echo $datos['idCareer']?>"> <?php echo $datos['CareerName']?> </option>
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
