<?php

require_once __DIR__ . '/vendor/autoload.php';

use function App\getCarList;

$cars = getCarList("Задание_данные.csv");
print_r($cars);

foreach ($cars as $car) {
    echo "{$car->getPhotoFileExt()}\n";
}

foreach ($cars as $car) {
    if ($car->getCarType() === 'truck') {
        echo "{$car->getBodyVolume()}\n";
    }
}