<?php
// registrar_descarga.php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$tipo = $input['tipo'] ?? '';

if (!in_array($tipo, ['escritorio', 'movil'])) {
    echo json_encode(['success' => false, 'error' => 'Tipo inválido']);
    exit;
}

require_once 'includes/db.php';

try {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $stmt = $pdo->prepare("INSERT INTO descargas (tipo_dispositivo, ip_usuario) VALUES (?, ?)");
    $stmt->execute([$tipo, $ip]);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    error_log("Error al registrar descarga: " . $e->getMessage());
    echo json_encode(['success' => false, 'error' => 'Error del servidor']);
}
?>