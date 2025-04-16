<?php
header('Content-Type: application/json');

// Connexió a la base de dades MySQL
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'alacant_app';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Endpoint per obtenir tots els llocs
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['endpoint'] == 'places') {
    $sql = "SELECT id, name, description, latitude, longitude FROM places";
    $result = $conn->query($sql);
    
    $places = [];
    while ($row = $result->fetch_assoc()) {
        $places[] = $row;
    }
    
    echo json_encode($places);
}

// Endpoint per obtenir un lloc per ID
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['endpoint']) && $_GET['endpoint'] == 'places' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM places WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Place not found']);
    }
}

$conn->close();
?>
