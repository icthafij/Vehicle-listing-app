<?php
namespace App\Classes;

trait FileHandler {
    protected function readFromFile($filePath) {
        if (file_exists($filePath)) {
            $data = file_get_contents($filePath);
            return json_decode($data, true);
        }
        return [];
    }

    protected function writeToFile($filePath, $data) {
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
