<?php
    use yii\helpers\Html;

    $this->title = 'Добавить товар';
    $this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "product-create">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>