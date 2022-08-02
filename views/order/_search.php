<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_client_order') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'mail') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'dop_info') ?>

    <?php // echo $form->field($model, 'delivery_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
