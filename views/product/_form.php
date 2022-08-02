<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use app\models\Categories;
    use app\models\Undercategories;
    use app\models\Stocks;
?>

<div class = "product-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'title', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'imglink', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->fileInput(); ?>
        <?= $form->field($model, 'description', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->textarea(['rows' => '5']); ?>
        <?= $form->field($model, 'cpfc', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'parameter', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'id_product_categories', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id_product_categories', 'name_product_categories'), ['prompt' => 'Выберите категорию']); ?>
        <?= $form->field($model, 'id_product_undercategories')->dropDownList(ArrayHelper::map(Undercategories::find()->all(), 'id_product_undercategories', 'name_product_undercategories'), ['prompt' => 'Выберите подкатегорию']); ?>
        <?= $form->field($model, 'id_stock')->dropDownList(ArrayHelper::map(Stocks::find()->all(), 'id_stock', 'name'), ['prompt' => 'Выберите акцию']); ?>
        <?= $form->field($model, 'quantity', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->textInput() ?>
        <?= $form->field($model, 'price', ['template' => '{label}<span style = "color: red"> *</span>{input}{error}'])->textInput() ?>

        <div class = "form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'admin-panel-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>