<?php
// Contraseña que deseas hashear
$password = "luca@gmail.com";

// Hashear la contraseña usando password_hash
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el resultado
echo "La contraseña hasheada es: " . $hashedPassword;
?>