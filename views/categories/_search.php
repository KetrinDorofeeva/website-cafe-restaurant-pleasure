<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="product-categories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_product_categories') ?>

    <?= $form->field($model, 'name_product_categories') ?>

    <?= $form->field($model, 'imglink') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
