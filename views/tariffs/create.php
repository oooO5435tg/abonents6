<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tariffs $model */

$this->title = 'Create Tariffs';
$this->params['breadcrumbs'][] = ['label' => 'Tariffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariffs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
