<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientbooking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientbooking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client_booking')->textInput() ?>

    <?= $form->field($model, 'id_condition')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
