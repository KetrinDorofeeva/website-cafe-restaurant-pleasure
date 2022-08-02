<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Авторизация';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "site-login">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}{input}{error}",
            
        ],
    ]); ?>

        <?= $form->field($model, 'login')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "{input}{label}{error}",
        ]) ?>
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    <?php ActiveForm::end(); ?>
</div>