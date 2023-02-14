<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Truck;

class TruckTest extends TestCase
{
    public function testMethodObject(): void
    {
        $this->assertEquals(60, (new Truck('truck', 'f2.png', 'Man', '20', '8x3x2.5'))->getBodyVolume());
        $this->assertEquals('png', (new Truck('truck', 'f2.png', 'Man', '20', '8x3x2.5'))->getPhotoFileExt());
    }
}
