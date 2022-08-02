<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UndercategoriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="undercategories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_product_undercategories') ?>

    <?= $form->field($model, 'name_product_undercategories') ?>

    <?= $form->field($model, 'imglink') ?>

    <?= $form->field($model, 'id_product_categories') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
