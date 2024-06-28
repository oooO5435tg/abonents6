<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $fio
 * @property string $phone
 * @property float $total_debt
 *
 * @property Debts[] $debts
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'fio', 'phone', 'total_debt'], 'required'],
            [['total_debt'], 'number'],
            [['username', 'email', 'fio'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'fio' => 'Fio',
            'phone' => 'Phone',
            'total_debt' => 'Total Debt',
        ];
    }

    /**
     * Gets query for [[Debts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebts()
    {
        return $this->hasMany(Debts::class, ['owner_id' => 'id']);
    }
}
