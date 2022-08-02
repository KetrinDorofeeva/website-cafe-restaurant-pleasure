<?php
    use yii\helpers\Html;

    $this->title = 'Редактировать подкатегорию меню: ' . $model->name_product_undercategories;
    $this->params['breadcrumbs'][] = ['label' => 'Подкатегории меню (напитки)', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Редактировать подкатегорию меню: ' . $model->name_product_undercategories;
?>

<div class = "undercategories-update">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>