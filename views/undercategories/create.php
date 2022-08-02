<?php
    use yii\helpers\Html;

    $this->title = 'Добавить подкатегорию';
    $this->params['breadcrumbs'][] = ['label' => 'Подкатегории меню (напитки)', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "undercategories-create">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>