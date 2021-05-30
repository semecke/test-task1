<?php

namespace app\models\ar;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class CarLogModel
 * @package app\models\ar
 *
 * @property $id
 * @property $car_id
 * @property $status
 * @property $create_date
 *
 * @property CarsModel $car
 */
class CarLogsModel extends ActiveRecord
{
    const STATUS_BUY = 1;
    const STATUS_REPAIR = 2;
    const STATUS_SOLD = 3;

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'car_logs';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id', 'car_id', 'status', 'create_date'], 'required'],
            [['id', 'car_id', 'status'], 'integer'],
            [['create_date'], 'safe']
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID записи лога',
            'car_id' => 'ID автомобиля',
            'status' => 'Статус лога',
            'create_date' => 'Дата лога',
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): CarLogsModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCarId(): int
    {
        return $this->car_id;
    }

    /**
     * @param int $car_id
     * @return $this
     */
    public function setCarId(int $car_id): CarLogsModel
    {
        $this->car_id = $car_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): CarLogsModel
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreateDate(): string
    {
        return $this->create_date;
    }

    /**
     * @param string $create_date
     * @return $this
     */
    public function setCreateDate(string $create_date): CarLogsModel
    {
        $this->create_date = $create_date;
        return $this;
    }

    /**
     * @return ActiveQuery
     */
    public function getCar(): ActiveQuery
    {
        return $this->hasOne(CarsModel::class, ['id', 'car_id']);
    }
}