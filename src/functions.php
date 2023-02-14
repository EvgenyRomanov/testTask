<?php

namespace App;

use App\{CarType, Car, Truck, SpecMachine};
use App\Exceptions\{FileNotFoundException, TypeCarException, TypeParamsForCarException, TypeParamsForTruckException};

/**
 * Парсит строки csv-файла и возвращает
 * список объектов с автомобилями и специальной техникой.
 *
 * @param  string $file   относительный
 *                        путь к файлу csv
 * @param  int    $length максимальная
 *                        длина строки
 * @return array
 */
function getCarList(string $file, int $length = 1000): array
{
    $carList = [];

    if (file_exists(dirname(__FILE__) . $file)) {
        throw new FileNotFoundException("Файл не найден");
    }

    $f = fopen($file, 'rt') or throw new \Exception('Ошибка открытия файла');

    for ($i = 0; $data = fgetcsv($f, $length, ';'); $i++) {
        if ($i === 0) {
            continue; // пропускаем имена полей
        }

        $num = count($data);

        if ($num !== 7) {
            continue; // не создаем объекты, если колонок меньше
        }

        try {
            switch ($data[0]) {
                case CarType::CAR:
                    $carList[] = new Car($data[0], $data[3], $data[1], $data[5], $data[2]);
                    break;
                case CarType::SCPECMACHINE:
                    $carList[] = new SpecMachine($data[0], $data[3], $data[1], $data[5], $data[6]);
                    break;
                case CarType::TRUCK:
                    $carList[] = new Truck($data[0], $data[3], $data[1], $data[5], $data[4]);
                    break;
            }
        } catch (TypeCarException $exp) {
            echo "В конструктор передан некорректный тип авто";
        } catch (TypeParamsForCarException $exp) {
            echo "В конструктор передан некорректно параметр 'кол-во пассажирских мест'";
        } catch (TypeParamsForTruckException $exp) {
            echo "В конструктор передан некорректно параметр, отвечающий за габариты кузова";
        }
    }

    fclose($f);

    return $carList;
}
