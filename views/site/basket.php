<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use kartik\datetime\DateTimePicker;

    $this->title = 'Корзина';
?>

<?php if (!empty($cartItems = $cart->getItems())): ?>
    <a href = "<?= Url::to(['site/clear']) ?>"><button class = "empty_basket_button">Очистить корзину</button></a>
<?php endif; ?>

<div class = "site-basket">
    <div class = "jumbotron">
        <div class = "basket_name">Корзина товаров</div>
    </div>

    <?php if(!empty($cartItems = $cart->getItems())): ?>
        <div class = "table-responsive" id = "basket_table">
            <table class = "table" style = "border: 1px solid #CCCCCC; border-collapse: collapse;">
                <body>
                    <tr>
                        <th style = "color: black; border: 1px solid #CCCCCC">Фото</th>
                        <th style = "color: black; border: 1px solid #CCCCCC">Название</th>
                        <th style = "color: black; border: 1px solid #CCCCCC">Описание</th>
                        <th style = "color: black; border: 1px solid #CCCCCC; width: 210px">Калорийность</th>
                        <th style = "color: black; border: 1px solid #CCCCCC">Параметры</th>
                        <th style = "color: black; border: 1px solid #CCCCCC">Цена за штуку</th>
                        <th style = "color: black; border: 1px solid #CCCCCC">Количество</th>
                        <th style = "color: black; border: 1px solid #CCCCCC">Цена</th>
                        <th style = "color: black; border: 1px solid #CCCCCC">Действие</th>
                    </tr>
                   
                    <?php foreach ($cartItems as $item): ?>
                        <tr class = "table_data">
                            <td style = "border: 1px solid #CCCCCC; text-align: center"><?= Html::img("@web/{$item->getProduct()->imglink}", ['width' => 120]) ?></td>
                            <td style = "border: 1px solid #CCCCCC; text-align: center"><?= $item->getProduct()->title ?></td>
                            <td style = "text-align: left; border: 1px solid #CCCCCC"><?= $item->getProduct()->description ?></td>
                            <td style = "border: 1px solid #CCCCCC;"><?= $item->getProduct()->cpfc ?></td>
                            <td style = "border: 1px solid #CCCCCC; text-align: center; width: 120px"><?= $item->getProduct()->parameter ?></td>
                            <td style = "border: 1px solid #CCCCCC; text-align: center; width: 80px"><?= $item->getPrice() . " ₽" ?></td>
                            <td style = "border: 1px solid #CCCCCC; text-align: center">
                                <button class = "plus_minus_button"><a href = "<?= Url::to(['site/change', 'id' => $item->getProduct()->id, 'qty' => -1])?>" class = "plus_minus_text">-</a></button>
                                <?= $item->getQuantity()?>
                                <button class = "plus_minus_button"><a href = "<?= Url::to(['site/change', 'id' => $item->getProduct()->id, 'qty' => 1])?>" class = "plus_minus_text">+</a></button>
                            </td>
                            <td style = "border: 1px solid #CCCCCC; text-align: center; width: 80px"><?= $item->getCost() . " ₽" ?></td>
                            <td style = "border: 1px solid #CCCCCC; text-align: center; font-weight: bold"><a href = "<?= Url::to(['site/remove', 'id' => $item->getId()])?>">Удалить</a></td>
                        </tr>
                    <?php endforeach; ?>  
                    
                    <tr>
                        <td style = "color: #E8AB84; font-weight: bold; width: 150px;">Итоговое кол-во: <?= $cart->getTotalCount() ?></td>
                    </tr>
                    <tr>
                        <td style = "color: #E8AB84; font-weight: bold; width: 190px">Итоговая сумма: <?= $cart->getTotalCost() . " ₽" ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </body>
            </table>
        </div>

        <div class = "order_big_block">
            <div class = "order_block">
                <div class = "order_block_header_text">Оформление заказа</div>
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
                        
                        echo $form->field($model, 'delivery_date')->widget(DateTimePicker::classname(), [
                            'options' => [
                                'placeholder' => 'гггг-мм-дд чч:мм',
                            ],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd hh:ii',
                                'todayHighlight' => true
                            ]
                        ]);

                        echo $form->field($model, 'address')->textInput();
                        echo $form->field($model, 'dop_info', ['template' => '{label}{input}<span class = "help-block-basket">{error}</span>'])->textarea();
                        echo $form->field($model, 'operator', ['template' => '{label}{input}{error}'])->checkbox(['value' => '1'])->label('');
                        echo Html::submitButton('ЗАКАЗАТЬ', ['class' => 'btn btn-success', 'name' => 'order-button', 'style' => 'margin-left: 50px; margin-top: 40px']);
                    ActiveForm::end();
                ?>
            </div>
        </div>
    <?php else: ?>
        <a href = "<?= Url::to(['site/fullmenu']) ?>"><div class = "basket_zero">Кликните здесь, чтобы перейти в меню и выбрать товар</div></a>
    <?php endif; ?>
</div>

<script src = "https://api-maps.yandex.ru/2.1?apikey=51785512-ffbb-44c5-9044-7f1ab310d38e&lang=ru_RU" type = "text/javascript"></script>
<script src = "script.js"></script>