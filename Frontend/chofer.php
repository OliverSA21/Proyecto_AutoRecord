<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'chofer') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Auto-Record - Panel del Chofer</title>
    <link rel="icon" type="image/x-icon" href="Favicons/google.ico">
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
<!-- MENÚ SUPERIOR -->
<header>
    <div class="logo-container">
        <img src="https://pbs.twimg.com/media/GK7DstZXwAApufZ.jpg" alt="Logo" class="logo-circle">
        Auto-Record<span class="role-label">Chofer</span>
    </div>
    <nav>
        <a href="index.html">Inicio</a>
        <a href="Funciones.html">Funciones</a>
        <a href="Descargas.html">Descarga</a>
        <a href="Nosotros.html">Nosotros</a>
        <a href="informacion.html">Información</a>
    </nav>
</header>

<main>
    <h1>Panel del Chofer</h1>
    <p class="subtitle">Bienvenido(a), <strong>Usuario</strong> — Unidad: <b>U-21</b></p>

    <!-- CONTENIDO PRINCIPAL EN DOS COLUMNAS -->
    <div class="main-content">
        <!-- COLUMNA IZQUIERDA: REPORTAR INCIDENCIA -->
        <div class="left-column">
            <div class="form-card">
                <h2>Reportar incidencia</h2>
                <form class="incident-form">
                    <div class="form-group">
                        <label>Tipo de incidencia:</label>
                        <select>
                            <option>Seleccionar tipo de incidencia</option>
                            <option>Falla mecánica</option>
                            <option>Accidente menor</option>
                            <option>Problema de tránsito</option>
                            <option>Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea placeholder="Describe brevemente lo ocurrido..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ubicación (opcional):</label>
                        <input type="text" placeholder="Ej. Av. Juárez y Calle 5">
                    </div>
                    <button type="button" class="btn-primary">Guardar Registro</button>
                </form>
            </div>
        </div>

        <!-- COLUMNA DERECHA: TU RUTA ASIGNADA + HISTORIAL -->
        <div class="right-column">
            <!-- TU RUTA ASIGNADA -->
            <div class="route-card">
                <h3>Tu ruta asigna</h3>
                <p><strong>Ruta:</strong> Ruta3 - Centro</p>
                <p><strong>Horario:</strong> 6:00 - 14:00</p>
                <p><strong>Paradas:</strong> Terminal-Norte / Plaza Central / Mercado Sur</p>
                <p><strong>Estado:</strong> <span class="status active">En Servicio</span></p>
            </div>

            <!-- HISTORIAL DE RUTAS RECIENTES -->
            <div class="history-section">
                <h3>Historial de rutas recientes</h3>
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Ruta</th>
                            <th>Horas</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10/12/2025</td>
                            <td>Ruta 3 - Centro</td>
                            <td>06:00 - 14:00</td>
                            <td><span class="status completed">Completada</span></td>
                        </tr>
                        <tr>
                            <td>09/12/2025</td>
                            <td>Ruta 3 - Centro</td>
                            <td>06:15 - 13:50</td>
                            <td><span class="status completed">Completada</span></td>
                        </tr>
                        <tr>
                            <td>08/12/2025</td>
                            <td>Ruta 3 - Centro</td>
                            <td>06:00 - 12:30</td>
                            <td><span class="status warning">Incidencia</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<footer>
    TechHive Labs 2025 • Gestión inteligente de transporte público
</footer>
    <!-- Al final, antes de </body> -->
    <script src="script.js"></script>
</body>
</html>