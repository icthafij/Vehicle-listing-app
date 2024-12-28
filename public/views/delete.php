<?php
require_once '../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$filePath = '../data/vehicles.json';
$vehicleManager = new VehicleManager('', '', '', '', $filePath);

// Check if ID is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $vehicles = $vehicleManager->getVehicles();

    if (isset($vehicles[$id])) {
        $vehicleManager->deleteVehicle($id);
        header('Location: ../index.php'); // Redirect to the main page after deletion
        exit;
    } else {
        die("Vehicle not found!");
    }
} else {
    die("Invalid vehicle ID!");
}
?>
