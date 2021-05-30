<?php

namespace app\models\ar;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Cars
 * @package app\models\ar
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property string $create_date
 * @property integer $owner_id
 *
 * @property CarLogsModel[] $carLogs
 * @property OwnersModel $owner
 */
class CarsModel extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'cars';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id', 'name', 'price', 'create_date', 'owner_id'], 'required'],
            [['id', 'price', 'owner_id'], 'integer'],
            [['name'], 'string'],
            [['create_date'], 'safe']
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID автомобиля',
            'name' => 'Название автомобиля',
            'price' => 'Цена автомобиля',
            'create_date' => 'Дата создания автомобиля',
            'owner_id' => 'Владелец автомобиля'
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
    public function setId(int $id): CarsModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): CarsModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return $this
     */
    public function setPrice(int $price): CarsModel
    {
        $this->price = $price;
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
    public function setCreateDate(string $create_date): CarsModel
    {
        $this->create_date = $create_date;
        return $this;
    }

    /**
     * @return ActiveQuery
     */
    public function getOwner(): ActiveQuery
    {
        return $this->hasOne(OwnersModel::class, ['id' => 'owner_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCarLogs(): ActiveQuery
    {
        return $this->hasMany(CarLogsModel::class, ['car_id' => 'id'])
            ->orderBy(['create_date' => 'ASC']);
    }

}