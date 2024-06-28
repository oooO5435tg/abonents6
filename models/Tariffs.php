<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tariffs".
 *
 * @property int $id
 * @property string $tariff_name
 * @property int $tariff_minutes
 * @property int $tariff_gbs
 * @property float $tariff_amount
 *
 * @property Debts[] $debts
 */
class Tariffs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariffs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tariff_name', 'tariff_minutes', 'tariff_gbs', 'tariff_amount'], 'required'],
            [['tariff_minutes', 'tariff_gbs'], 'integer'],
            [['tariff_amount'], 'number'],
            [['tariff_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tariff_name' => 'Tariff Name',
            'tariff_minutes' => 'Tariff Minutes',
            'tariff_gbs' => 'Tariff Gbs',
            'tariff_amount' => 'Tariff Amount',
        ];
    }

    /**
     * Gets query for [[Debts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebts()
    {
        return $this->hasMany(Debts::class, ['tariff_id' => 'id']);
    }
}
