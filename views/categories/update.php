<?php
    use yii\helpers\Html;

    $this->title = 'Редактировать категорию меню: ' . $model->name_product_categories;
    $this->params['breadcrumbs'][] = ['label' => 'Категории меню', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Редактировать категорию меню: ' . $model->name_product_categories;
?>

<div class = "product-categories-update">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>