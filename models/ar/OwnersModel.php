<?php

namespace app\models\ar;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class OwnersModel
 * @package app\models\ar
 *
 * @property integer $id
 * @property string $name
 *
 * @property CarsModel $cars
 */
class OwnersModel extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'owners';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string']
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID владельца',
            'name' => 'Имя владельца',
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
     * @return OwnersModel
     */
    public function setId(int $id): OwnersModel
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
     * @return OwnersModel
     */
    public function setName(string $name): OwnersModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return ActiveQuery
     */
    public function getCars(): ActiveQuery
    {
        return $this->hasOne(CarsModel::class, ['owner_id' => 'id']);
    }
}