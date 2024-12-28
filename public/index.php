<?php
require_once 'app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$filePath = 'data/vehicles.json';
$vehicleManager = new VehicleManager('', '', '', '', $filePath);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'])) {
        // Add vehicle
        $vehicleManager->addVehicle([
            'name' => $_POST['name'],
            'type' => $_POST['type'],
            'price' => $_POST['price'],
            'image' => $_POST['image']
        ]);
    }
}

$vehicles = $vehicleManager->getVehicles();
?>

<?php include('views/header.php'); ?>

<h2>Vehicle List</h2>
<a href="views/add.php" class="btn btn-success mb-3">Add New Vehicle</a>
<div class="row">
    <?php foreach ($vehicles as $id => $vehicle): ?>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="<?= $vehicle['image'] ?>" alt="<?= $vehicle['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $vehicle['name'] ?></h5>
                    <p class="card-text"><?= $vehicle['type'] ?> - $<?= $vehicle['price'] ?></p>
                    <a href="views/edit.php?id=<?= $id ?>" class="btn btn-warning">Edit</a>
                    <a href="views/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include('views/footer.php'); ?>
