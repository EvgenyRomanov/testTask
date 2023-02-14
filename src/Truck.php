<?php

namespace App;

use App\Exceptions\TypeParamsForTruckException;

class Truck extends BaseCar
{
    /**
     * @var float
     */
    private $bodyLength;

    /**
     * @var float
     */
    private $bodyWidth;

    /**
     * @var float
     */
    private $bodyHeight;

    /**
     * Конструктор класса Truck.
     *
     * @param  string $carType       тип
     *                               авто
     * @param  string $photoFileName имя файла изображения
     * @param  string $brand         бренд
     * @param  string $carrying
     * @param  string $bodyWHL       габариты
     * @return void
     */
    public function __construct($carType, $photoFileName, $brand, $carrying, $bodyWHL = '')
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);

        if ($bodyWHL === '') {
            $this->bodyHeight = $this->bodyWidth = $this->bodyLength = 0;
        } else {
            $params = explode('x', $bodyWHL);

            $isNumericAll = array_reduce(
                $params,
                function ($accumulator, $item) {
                    return is_numeric($item) && $accumulator;
                },
                true
            );

            if (!$isNumericAll || (count($params) !== 3)) {
                throw new TypeParamsForTruckException();
            }

            [$this->bodyWidth, $this->bodyHeight, $this->bodyLength] = array_map(
                function ($item) {
                    return (float) $item;
                },
                $params
            );
        }
    }

    /**
     * Возвращаяет объем кузова в метрах кубических.
     *
     * @api
     * @return float
     */
    public function getBodyVolume(): float
    {
        return $this->bodyLength * $this->bodyWidth * $this->bodyHeight;
    }
}
