<?php
//// Definición de variables para la conexión a la base de datos
$usuario = "root";
$servidor = "localhost";
$password=""; 
$baseDatos = "udesDB";

// Establecer conexión con el servidor MySQL Si falla, termina la ejecución y muestra "se produjo un error"
$conexion = mysqli_connect($servidor, $usuario, $password) or die("se produjo un error");
// Seleccionar la base de datos específica
$bd = mysqli_select_db($conexion, $baseDatos);

//Verificar si se ha enviado el formulario
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nombres = $_POST['nombres'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $ci = $_POST['ci'];
    $direccion = $_POST['direccion'];

    //Consulta SQL para insertar datos
    $sql = "INSERT INTO clientes (nombres, apellido_paterno, apellido_materno, ci, direccion) VALUES('$nombres','$apellido_paterno', '$apellido_materno','$ci', '$direccion')";

    //Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        echo "<p>Cliente agragado correctamente.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Clientes</title>
</head>
<body>
    <h2>Adicionar Nuevo Cliente</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombres">Nombres:</label><br>
        <input type="text" id="nombres" name="nombres" required><br><br>

        <label for="apellido_paterno">Apellido Paterno:</label><br>
        <input type="text" id="apellido_paterno" name="apellido_paterno" required><br><br>

        <label for="apellido_materno">Apellido Materno:</label><br>
        <input type="text" id="apellido_materno" name="apellido_materno" required><br><br>

        <label for="ci">CI:</label><br>
        <input type="number" id="ci" name="ci" required><br><br>

        <label for="direccion">Direccion:</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>
        
        <input type="submit" values="Adicionar Cliente">
    </form>
    <br>
    <a href="clientes.php">Ver lista de clientes</a>
</body>
</html>