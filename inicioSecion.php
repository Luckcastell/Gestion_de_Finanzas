<!DOCTYPE html>
<html lang="en">          
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="CSS/inicio.css">
    <title>Inicio de sesión</title>
</head>
<body>
    <form action="inicioSecionBD.php" method="POST">
        <center><h1>INICIAR SESIÓN</h1></center>
        <br>
        <hr>
        <?php
            if (isset($_GET['error'])) {
            ?>
            <p class="error">
                <?php
                    echo $_GET['error']
                    ?>
            </p>
        <?php
            }
        ?>
        <br>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <center><input type="email" name="email" placeholder ="Mail de Usuario"></center>
        <br>
        <i class="fa-solid fa-key"></i>
        <label>Contraseña</label>
        <center><input type="password" name="clave" placeholder ="Contraseña"></center>
        <br>
        <hr>
        <div class="g-recaptcha" data-sitekey="6Lfm7lUqAAAAAHKX6wXP-RE0yRr7ieeVHn9yUJz5">
        </div>
        <br>
        <center><button type="submit">Iniciar Sesión</button></center>
        <br>
        <center><a href="registro.php">¿No tienes cuenta?</a></center>
    </form>
</body>
</html>
