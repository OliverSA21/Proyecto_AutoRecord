<!-- includes/header.php -->
<header>
    <div class="logo">Auto-Record</div>
    <nav>
        <a href="index.php" <?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'class="active"' : '' ?>>Inicio</a>
        <a href="Funciones.php" <?= basename($_SERVER['PHP_SELF']) === 'Funciones.php' ? 'class="active"' : '' ?>>Funciones</a>
        <a href="Descargas.php" <?= basename($_SERVER['PHP_SELF']) === 'Descargas.php' ? 'class="active"' : '' ?>>Descarga</a>
        <a href="Nosotros.php" <?= basename($_SERVER['PHP_SELF']) === 'Nosotros.php' ? 'class="active"' : '' ?>>Nosotros</a>
        <a href="informacion.php" <?= basename($_SERVER['PHP_SELF']) === 'informacion.php' ? 'class="active"' : '' ?>>Información</a>
    </nav>
</header>