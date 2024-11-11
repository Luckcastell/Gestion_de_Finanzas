<?php
session_start();
include('Conexion.php');

if (isset($_POST['email']) && isset($_POST['clave']) && isset($_POST['confirmar_clave']) && isset($_POST['verificacion_clave'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Empleado = validate($_POST['email']);
    $Clave = validate($_POST['clave']);
    $ConfirmarClave = validate($_POST['confirmar_clave']);
    $VerificacionClave = validate($_POST['verificacion_clave']);

    // Verificar que las contraseñas coincidan
    if ($Clave !== $ConfirmarClave) {
        header("Location: nuevoUsuario.php?error=Las contraseñas no coinciden");
        exit();
    }

    // Verificar la contraseña de verificación
    $sqlVerificacion = "SELECT * FROM empleados WHERE id_empleado = 0";
    $resultadoVerificacion = mysqli_query($conexion, $sqlVerificacion);
    $rowVerificacion = mysqli_fetch_assoc($resultadoVerificacion);

    if ($rowVerificacion && !password_verify($VerificacionClave, $rowVerificacion['clave'])) {
        header("Location: nuevoUsuario.php?error=Contraseña de verificación incorrecta");
        exit();
    }

    // Verificar que el email no esté vacío
    if (empty($Empleado)) {
        header("Location: nuevoUsuario.php?error=El Mail es requerido");
        exit();
    }

    // Verificar que la contraseña no esté vacía
    if (empty($Clave)) {
        header("Location: nuevoUsuario.php?error=La Clave es requerida");
        exit();
    }

    // Hash de la contraseña antes de almacenarla
    $ClaveHash = password_hash($Clave, PASSWORD_DEFAULT);

    // Verificar si el usuario ya existe
    $sql = "SELECT * FROM empleados WHERE email='$Empleado'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        header("Location: nuevoUsuario.php?error=El usuario ya existe");
        exit();
    } else {
        // Insertar nuevo usuario en la base de datos
        $sqlInsert = "INSERT INTO empleados (email, clave) VALUES ('$Empleado', '$ClaveHash')";
        if (mysqli_query($conexion, $sqlInsert)) {
            header("Location:  menu.html?success=Registro exitoso");
            exit();
        } else {
            header("Location: nuevoUsuario.php?error=Error al registrar el usuario");
            exit();
        }
    }
} else {
    header("Location: nuevoUsuario.php");
    exit();
}
?>