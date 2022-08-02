<?php
    use yii\helpers\Html;

    $this->title = 'Редактировать товар: ' . $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Редактировать товар: ' . $model->title;
?>

<div class = "product-update">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>