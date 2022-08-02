<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="product-categories-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name_product_categories', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'imglink', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->fileInput(); ?>

        <div class = "form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'admin-panel-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>