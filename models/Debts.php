<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debts".
 *
 * @property int $id
 * @property int $owner_id
 * @property string $debt_type
 * @property int|null $tariff_id
 * @property float $debt_amount
 * @property int $status
 *
 * @property Clients $owner
 * @property Tariffs $tariff
 */
class Debts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'debts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner_id', 'debt_type', 'debt_amount'], 'required'],
            [['owner_id', 'tariff_id', 'status'], 'integer'],
            [['debt_amount'], 'number'],
            [['debt_type'], 'string', 'max' => 255],
            ['status', 'default', 'value' => 0],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['owner_id' => 'id']],
            [['tariff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tariffs::class, 'targetAttribute' => ['tariff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Owner ID',
            'debt_type' => 'Debt Type',
            'tariff_id' => 'Tariff ID',
            'debt_amount' => 'Debt Amount',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Clients::class, ['id' => 'owner_id']);
    }

    /**
     * Gets query for [[Tariff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTariff()
    {
        return $this->hasOne(Tariffs::class, ['id' => 'tariff_id']);
    }
}
