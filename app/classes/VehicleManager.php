<?php
namespace App\Classes;

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    private $filePath;

    public function __construct($name, $type, $price, $image, $filePath) {
        parent::__construct($name, $type, $price, $image);
        $this->filePath = $filePath;
    }

    public function getDetails() {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
        ];
    }

    public function getVehicles() {
        return $this->readFromFile($this->filePath);
    }

    public function addVehicle($data) {
        $vehicles = $this->getVehicles();
        $vehicles[] = $data;
        $this->writeToFile($this->filePath, $vehicles);
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->getVehicles();
        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data;
            $this->writeToFile($this->filePath, $vehicles);
        }
    }

    public function deleteVehicle($id) {
        $vehicles = $this->getVehicles();
        if (isset($vehicles[$id])) {
            unset($vehicles[$id]);
            $this->writeToFile($this->filePath, array_values($vehicles));
        }
    }
}
