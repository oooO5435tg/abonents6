<?php

use app\models\Debts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Debts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Debts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'owner_id',
            'debt_type',
            [
                'attribute' => 'tariff_id',
                'value' => function ($model) {
                    return $model->tariff_id ? $model->tariff_id : '-';
                }
            ],
            'debt_amount',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Debts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
