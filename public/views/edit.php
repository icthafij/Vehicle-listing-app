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
        $vehicle = $vehicles[$id];
    } else {
        die("Vehicle not found!");
    }
} else {
    die("Invalid vehicle ID!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the vehicle details
    $updatedVehicle = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    $vehicleManager->editVehicle($id, $updatedVehicle);
    header('Location: ../index.php'); // Redirect to the main page after updating
    exit;
}

?>

<?php include('../views/header.php'); ?>

<h2>Edit Vehicle</h2>
<form action="edit.php?id=<?= $id ?>" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $vehicle['name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="type">Type:</label>
        <input type="text" class="form-control" id="type" name="type" value="<?= $vehicle['type'] ?>" required>
    </div>
    <div class="form-group">
     
