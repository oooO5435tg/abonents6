<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Debts $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $tariffs */
?>

<div class="debts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'owner_id')->textInput() ?>

    <?= $form->field($model, 'debt_type')->dropDownList([
        'Абонентская плата' => 'Абонентская плата',
        'Повременная оплата' => 'Повременная оплата',
    ]) ?>

    <p>Пропустите тариф, если выбрали повременную задолженность:</p>

    <?= $form->field($model, 'tariff_id')->dropDownList(
        ArrayHelper::map($tariffs, 'id', 'tariff_name'),
        ['prompt' => 'Выберите тариф']
    ) ?>

    <p>Поставьте 0, если выбрали абонентскую задолженность:</p>

    <?= $form->field($model, 'debt_amount')->textInput(['maxlength' => true, 'id' => 'debt-amount-field', 'style' => $model->debt_type == 'Абонентская плата' ? 'display:none;' : ''])->label('Сумма задолженности') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>