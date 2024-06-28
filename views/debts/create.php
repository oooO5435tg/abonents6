<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Debts $model */

$this->title = 'Create Debts';
$this->params['breadcrumbs'][] = ['label' => 'Debts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tariffs' => $tariffs,
    ]) ?>

</div>
