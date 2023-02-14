<?php

namespace App;

use App\Exceptions\TypeCarException;

class BaseCar
{
    /**
     * Список разрешенных типов автомобилей
     *
     * @var array
     */
    private $permissionTypeCar = [CarType::CAR, CarType::SCPECMACHINE, CarType::TRUCK];

    /**
     * @var string
     */
    private $carType;

    /**
     * @var string
     */
    private $photoFileName;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var float
     */
    private $carrying;

    /**
     * Конструктор класса BaseCar.
     *
     * @param  string $carType       тип
     *                               авто
     * @param  string $photoFileName имя файла изображения
     * @param  string $brand         бренд
     * @param  string $carrying
     * @return void
     */
    public function __construct($carType, $photoFileName, $brand, $carrying)
    {
        if (!in_array($carType, $this->permissionTypeCar)) {
            throw new TypeCarException();
        }

        $this->carType = $carType;
        $this->photoFileName = $photoFileName;
        $this->brand = $brand;
        $this->carrying = (float) $carrying;
    }

    /**
     * Возвращает расширение файла ('.png', '.jpeg' и т.д.) с фото.
     *
     * @api
     * @return string
     */
    public function getPhotoFileExt(): string
    {
        $params = pathinfo($this->photoFileName);

        if (array_key_exists('extension', $params)) {
            return $params['extension'];
        }

        return 'undefined';
    }

    /**
     * Возвращает тип авто
     *
     * @return string
     */
    public function getCarType(): string
    {
        return $this->carType;
    }
}
