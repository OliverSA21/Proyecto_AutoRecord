<?php
session_start();
if (isset($_SESSION['rol'])) {
    header("Location: " . $_SESSION['rol'] . "dbconnection.php");
    exit;
}

$error = '';
if ($_POST) {
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

    // Aquí harías una consulta a la base de datos
    // Por ahora, usamos credenciales fijas para prueba
    if ($usuario === 'admin' && $password === '123') {
        $_SESSION['rol'] = 'admin';
        header("Location: admin/dashboard.php");
    } elseif ($usuario === 'checador' && $password === '123') {
        $_SESSION['rol'] = 'checador';
        header("Location: checador.php");
    } elseif ($usuario === 'chofer' && $password === '123') {
        $_SESSION['rol'] = 'chofer';
        header("Location: chofer.php");
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Auto-Record</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div style="max-width: 400px; margin: 100px auto; text-align: center;">
        <h2>Auto-Record</h2>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required style="display:block; width:100%; margin:10px 0; padding:10px;">
            <input type="password" name="password" placeholder="Contraseña" required style="display:block; width:100%; margin:10px 0; padding:10px;">
            <button type="submit" style="width:100%; padding:10px; background:#3b82f6; color:white; border:none; border-radius:6px;">Entrar</button>
        </form>
    </div>
</body>
</html>