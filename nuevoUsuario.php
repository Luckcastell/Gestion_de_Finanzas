<!DOCTYPE html>
<html lang="en">          
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/secion.css">
    <title>Registro de Usuario</title>
</head>
<body>
    <form action="nuevoUsuarioBD.php" method="POST">
        <center><h1>REGISTRARSE</h1></center>
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
        <label>Correo Electrónico</label>
        <center><input type="email" name="email" placeholder="Mail de Usuario" required></center>
        <br>
        <i class="fa-solid fa-key"></i>
        <label>Contraseña</label>
        <center><input type="password" name="clave" placeholder="Contraseña" required></center>
        <br>
        <i class="fa-solid fa-key"></i>
        <label>Confirmar Contraseña</label>
        <center><input type="password" name="confirmar_clave" placeholder="Confirmar Contraseña" required></center>
        <br>
        <i class="fa-solid fa-lock"></i>
        <label>Contraseña de Verificación</label>
        <center><input type="password" name="verificacion_clave" placeholder="Contraseña de Verificación" required></center>
        <br>
        <hr>
        <center><button type="submit">Registrar</button></center>
        <br>
    </form>
</body>
</html>