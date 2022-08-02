<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\captcha\Captcha;

    $this->title = 'Контакты';
?>

<div class = "jumbotron">
    <div class = "contact_name">Контакты</div>
</div>
    
<p class = "contact_text">
    <span class = "bold_text">Адрес:</span> город Санкт-Петербург, улица Инженерная, дом 7<br><br>

    <span class = "bold_text">Позвонить/забронировать столик:</span> 8 (981) 942-53-40<br><br>

    <span class = "bold_text">E-mail:</span> cafe_restaurant_pleasure@email.com<br><br>

    <span class = "bold_text">Режим работы:</span> Пн-пт с 11:00 до 23:00<br>
    <span class = "time_text">Сб-вс с 12:00 до 22:00</span>
</p>

<iframe src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.6905322827097!2d30.33474761544025!3d59.93727716917132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696310975036abf%3A0x41b81c122265aa2!2z0JjQvdC20LXQvdC10YDQvdCw0Y8g0YPQuy4sIDcsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTEwMjM!5e0!3m2!1sru!2sru!4v1633972477671!5m2!1sru!2sru" class = "map" width = "1140" height = "450" style = "border:0;" allowfullscreen = "" loading = "lazy"></iframe>

<div class = "feedback_block">
    <div class = "feedback">
        <h1 class = "feedback_text">Форма обратной связи</h1>
        
        <p class = "can_message">Здесь вы можете отправить нам сообщение</p>

        <div class = "row">
            <div class = "col-lg-5">
                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'fieldConfig' => [
                        'template' => '{label}{input}<span class = "error_verify">{error}</span>',
                    ],
                ]); ?>

                    <?= $form->field($model, 'name', ['template' => '{label}{input}<span class = "error_contact">{error}</span>'])->textInput() ?>
                    <?= $form->field($model, 'email', ['template' => '{label}{input}<span class = "error_contact">{error}</span>'])->textInput(['placeholder' => 'Только почта yandex.ru']) ?>
                    <?= $form->field($model, 'subject', ['template' => '{label}{input}<span class = "error_contact">{error}</span>']) ?>
                    <?= $form->field($model, 'body', ['template' => '{label}{input}<span class = "message_error">{error}</span>'])->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3" style = "margin-left: 5px">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class = "form-group">
                        <?= Html::submitButton('ОТПРАВИТЬ', ['class' => 'btn btn-success', 'name' => 'contact-button', 'style' => 'margin-left: 50px; margin-top: 60px']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>