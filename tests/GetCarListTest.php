<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\{Car, Truck};

use function App\getCarList;

class GetCarListTest extends TestCase
{
    public function testGetList(): void
    {
        $this->assertEquals([
            new Car('car', 'f1.jpeg', 'Nissan xTtrail', '2.5', '4'),
            new Truck('truck', 'f2.png', 'Man', '20', '8x3x2.5'),
            new Truck('truck', 'f2.png', 'Man', '20'),
            new Car('car', 'f3.jpeg', 'Mazda 6', '2.5', '4')
        ], getCarList("Задание_данные.csv"));
    }
}
