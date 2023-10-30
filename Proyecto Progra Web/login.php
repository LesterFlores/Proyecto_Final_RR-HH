<?php
session_start();
include("conexion.php"); // Incluye el archivo de conexión a la base de datos

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para buscar el usuario en la base de datos
    $sql = "SELECT * FROM tbl_usuarios WHERE Nombre_Usuario = '$username' AND Contrasena = '$password'";
    $result = mysqli_query($conexion, $sql);

    // Comprueba si se encontró un usuario válido
    if ($result) {
        // Comprueba si se encontró un usuario válido
        if (mysqli_num_rows($result) == 1) {
            // Usuario válido, inicia sesión y redirige
            $_SESSION['username'] = $username;
            header("location: Lista_Empleados.php"); // Redirige a la página de bienvenida
        } else {
            // Usuario o contraseña inválidos, muestra un mensaje de error
            header("location: index2.php");
        }
    } else {
        // Error en la consulta SQL
        $error_message = "Error en la consulta: " . mysqli_error($conexion);
    }
}

// Ahora puedes mostrar el mensaje de error si existe
if (isset($error_message)) {
    echo $error_message;
}
?>