<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consultas select a la base de datos,en este caso a las 2 tablas
$selectidBookCatalog = mysqli_query($conexion,"SELECT idBookCatalog,bookTitle  FROM bookcatalog");
$selectidStudent = mysqli_query($conexion,"SELECT idStudent,nameStudent  FROM Student");
$selectidAuthorization = mysqli_query($conexion,"SELECT idAuthorization  FROM authorization_");
$selectidEmployee  = mysqli_query($conexion,"SELECT idEmployee,nameEmployee  FROM employee");
$selectidToolCatalog  = mysqli_query($conexion,"SELECT idToolCatalog ,nameToolCatalog   FROM ToolCatalog");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario loanaplication</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar loanaplication</h2>
    <form action="insertar_loanaplication.php" method="POST">
                <div>
               
                         <label for="numberLoan">numberLoan:</label>
                         <input class="form-control" type="text"  name="numberLoan" id="numberLoan">
                    </div>

                    <div class="form-group">
                        <label for="descriptionLoanAplication">descriptionLoanAplication:</label>
                        <input class="form-control" type="text"  name="descriptionLoanAplication" id="descriptionLoanAplication">
                    </div>
                 
                    <div class="form-group">
                     <label for="deliveryDate">deliveryDate:</label>
                    <input class="form-control" type="date" name="deliveryDate" id="deliveryDate">
                   </div>

                    <div class="form-group">
                        <label for="departureDate">departureDate:</label>
                        <input class="form-control" type="date"  name="departureDate" id="departureDate">
                    </div>
                 
                    <label for="quantity">quantity:</label>
                         <input class="form-control" type="text"  name="quantity" id="quantity">
                      
                    <div class="form-group">
            <label for="idStudent">Student:</label>
            <select name="idStudent" id="idStudent" class="form-control">
                <?php 
                while($employee = mysqli_fetch_array($selectidStudent)) {
                    ?>
                    <option value="<?php echo $employee['idStudent']; ?>"><?php echo $employee['nameStudent']; ?></option>
                    <?php
                }
                ?>
            </select>

            <label for="idAuthorization">Authorization:</label>
            <select name="idAuthorization" id="idAuthorization" class="form-control">
                <?php 
                while($employee = mysqli_fetch_array($selectidAuthorization)) {
                    ?>
                    <option value="<?php echo $employee['idAuthorization']; ?>"><?php echo $employee['idAuthorization']; ?></option>
                    <?php
                }
                ?>
            </select>

            <label for="idEmployee">Employee:</label>
            <select name="idEmployee" id="idEmployee" class="form-control">
                <?php 
                while($employee = mysqli_fetch_array($selectidEmployee)) {
                    ?>
                    <option value="<?php echo $employee['idEmployee']; ?>"><?php echo $employee['nameEmployee']; ?></option>
                    <?php
                }
                ?>
            </select>

            <label for="idBookCatalog">BookCatalog:</label>
            <select name="idBookCatalog" id="idBookCatalog" class="form-control">
                <?php 
                while($employee = mysqli_fetch_array($selectidBookCatalog)) {
                    ?>
                    <option value="<?php echo $employee['idBookCatalog']; ?>"><?php echo $employee['bookTitle']; ?></option>
                    <?php
                }
                ?>
            </select>

            <label for="idToolCatalog">ToolCatalog:</label>
            <select name="idToolCatalog" id="idToolCatalog" class="form-control">
                <?php 
                while($employee = mysqli_fetch_array($selectidToolCatalog)) {
                    ?>
                    <option value="<?php echo $employee['idToolCatalog']; ?>"><?php echo $employee['nameToolCatalog']; ?></option>
                    <?php
                }
                ?>
            </select>
       
        </div>
        <button type="submit" class="btn btn-primary">Insertar</button>
    </form>
 
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
