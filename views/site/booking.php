<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use kartik\datetime\DateTimePicker;

    $this->title = 'Забронировать столик';
?>

<div class = "site-booking">
    <div class = "booking_block">
        <div class = "booking_block_header">
            <div class = "booking_block_header_text">Бронирование столика в Pleasure</div>
        </div>
        
        <?php
            $form = ActiveForm::begin([
                'id' => 'myform',
                'method' => 'post',
                'fieldConfig' => [
                    'template' => '{label}<span style = "color: red"> *</span>{input}<span class = "help-block-basket">{error}</span>',
                ],
            ]);

                echo $form->field($model, 'fio')->textInput(['placeholder' => 'Иванов И.И', 'maxlength' => 30]);
                echo $form->field($model, 'phone')->textInput(['placeholder' => '+7 (111) 111-11-11']);
                echo $form->field($model, 'mail')->input('mail')->textInput(); 
                echo $form->field($model, 'number_client')->textInput();

                echo $form->field($model, 'booking_date')->widget(DateTimePicker::classname(), [
                    'options' => [
                        'placeholder' => 'гггг-мм-дд чч:мм',
                    ],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:ii',
                        'todayHighlight' => true
                    ]
                ]);
                
                echo $form->field($model, 'wishes', ['template' => '{label}{input}<span class = "help-block-basket">{error}</span>'])->textarea(['rows' => '3']);
                echo $form->field($model, 'operator', ['template' => '{label}{input}{error}'])->checkbox(['value' => '1'])->label('');
                echo Html::submitButton('ЗАБРОНИРОВАТЬ', ['class' => 'btn btn-success', 'name' => 'booking-button', 'style' => 'margin-left: 50px; margin-top: 40px']);
            ActiveForm::end();
        ?>
    </div>
</div>