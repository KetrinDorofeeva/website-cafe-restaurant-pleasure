<?php
    use yii\helpers\Html;

    $this->title = 'Редактировать акцию: ' . $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Акции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Редактировать акцию: ' . $model->name;
?>

<div class = "stocks-update">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>