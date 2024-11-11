<?php
    session_start();           
    include('Conexion.php');

    if (isset($_POST['email']) && isset($_POST['clave']) ) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Empleado = validate($_POST['email']);
        $Clave = validate($_POST['clave']);

        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretKey ="6Lfm7lUqAAAAAGyD4MVXCXmhOp9plTjDIpN6AJSP";

        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip");

        $atributos = json_decode($respuesta, true);

        if(!$atributos['success']){
            header("Location: inicioSecion.php?error=Verificar captcha");
            exit();
        }
        elseif (empty($Empleado)) {
            header("Location: inicioSecion.php?error=El Mail es requerido");
            exit();
        }
        elseif (empty($Clave)) {
            header("Location: inicioSecion.php?error=La Clave es requerida");
            exit();
        }
        else{

            $sql = "SELECT * FROM empleados WHERE email = '$Empleado' AND clave = '$Clave'";
            $resultado = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);
        
                // Verificar la contraseña
                if (password_verify($Clave, $row['clave'])) {
                    // Contraseña correcta, iniciar sesión
                    $_SESSION['user_id'] = $row['id_empleado']; // O cualquier otro dato que necesites
                    header("Location: dashboard.php"); // Redirige a la página principal o dashboard
                    exit();
                } else {
                    header("Location: inicioSecion.php?error=Contraseña incorrecta");
                    exit();
                }
            } else {
                header("Location: inicioSecion.php?error=Usuario no encontrado");
                exit();
            }
    }else{
        header("Location: inicioSecion.php");
        exit();
    }

?>
