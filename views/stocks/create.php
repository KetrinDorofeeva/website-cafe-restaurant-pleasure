<?php
    use yii\helpers\Html;

    $this->title = 'Добавить акцию';
    $this->params['breadcrumbs'][] = ['label' => 'Акции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "stocks-create">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>