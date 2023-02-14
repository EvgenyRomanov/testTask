<?php

namespace App;

class SpecMachine extends BaseCar
{
    /**
     * @var string
     */
    private $extra;

    /**
     * Конструктор класса SpecMachine.
     *
     * @param  string $carType       тип
     *                               авто
     * @param  string $photoFileName имя файла изображения
     * @param  string $brand         бренд
     * @param  string $carrying
     * @param  string $extra
     * @return void
     */
    public function __construct($carType, $photoFileName, $brand, $carrying, $extra)
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);
        $this->extra = $extra;
    }
}
