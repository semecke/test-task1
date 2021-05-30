<?php

namespace app\services;

use app\models\ar\CarLogsModel;
use app\models\ar\CarsModel;

/**
 * Class CarService
 * @package app\services
 */
class CarService
{
    /**
     * @return array
     */
    public static function getCarsListDetailInfoArray(): array
    {
        try {
            /** @var CarsModel[] $cars_model_list */
            $cars_model_list = CarsModel::find()
                ->joinWith(['owner', 'carLogs'])
                ->orderBy(['id' => 'ASC'])
                ->all();

            $response_cars = [];
            foreach ($cars_model_list as $car_model) {
                $date_buy = $car_model->getCreateDate();
                $date_sold = null;
                $count_repair = 0;

                foreach ($car_model->carLogs as $log) {
                    if ($log->getStatus() === CarLogsModel::STATUS_BUY) {
                        $date_buy = $log->getCreateDate();
                    }

                    if ($log->getStatus() === CarLogsModel::STATUS_SOLD) {
                        $date_sold = $log->getCreateDate();
                    }

                    if (($log->getStatus() === CarLogsModel::STATUS_REPAIR) && empty($date_sold)) {
                        $count_repair++;
                    }
                }

                $response_cars[] = array_merge($car_model->toArray(), [
                    'owner_name' => $car_model->owner->getName(),
                    'date_buy' => $date_buy,
                    'date_sold' => $date_sold,
                    'count_repair' => $count_repair
                ]);
            }

            return $response_cars;
        } catch (\Exception $exception) {
            return [];
        }
    }
}