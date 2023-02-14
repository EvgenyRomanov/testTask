<?php

namespace App;

use App\Exceptions\TypeParamsForCarException;

class Car extends BaseCar
{
    /**
     * @var integer
     */
    private $passengerSeatsCount;

    /**
     * Конструктор класса Car.
     *
     * @param  string $carType             тип
     *                                     авто
     * @param  string $photoFileName       имя файла
     *                                     изображения
     * @param  string $brand               бренд
     * @param  string $carrying
     * @param  string $passengerSeatsCount кол-вл пассажирских мест
     * @return void
     */
    public function __construct($carType, $photoFileName, $brand, $carrying, $passengerSeatsCount)
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);

        if (!is_numeric($passengerSeatsCount)) {
            throw new TypeParamsForCarException();
        }

        $this->passengerSeatsCount = (int) $passengerSeatsCount;
    }
}
