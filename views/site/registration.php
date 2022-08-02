<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Регистрация';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "site-registration">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?php 
        $form = ActiveForm::begin([
            'id' => 'myform',
            'method' => 'post',
            'fieldConfig' => [
                'template' => '{label}{input}{error}',
            ],
        ]);

            echo $form->field($model, 'login')->textInput();
            echo $form->field($model, 'password')->passwordInput();
            echo $form->field($model, 'confirm_password')->passwordInput();
            echo "<br>";
            echo Html::submitButton("Зарегистрироваться", ['class' => 'btn btn-primary']);
        ActiveForm::end(); 
    ?>
</div>