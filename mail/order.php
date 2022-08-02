<?php
    use yii\helpers\Html;
    $this->title = 'Заказ в кафе-ресторане "Pleasure" № ' . $model->id_client_order;
?>

<h1><?= Html::encode($this->title); ?></h1>

<ul>
    <li>Фамилия и инициалы: <?= Html::encode($model->fio) ?></li>
    <li>Телефон: <?= Html::encode($model->phone) ?></li>
    <li>E-mail: <?= Html::encode($model->mail) ?></li>
    <li>Дата и время доставки: <?= Html::encode($model->delivery_date) ?></li>
    <li>Адрес доставки: <?= Html::encode($model->address) ?></li>
    <li>Комментарий (дополнительная информация): <?= Html::encode($model->dop_info) ?></li>
</ul>

<table style = "border: 1" cellpadding = "3" cellspacing = "0">
    <tr>
        <th style = "align: left">Номер</th>
        <th style = "align: left">Товар</th>
        <th style = "align: left">Количество, шт.</th>
        <th style = "align: left">Цена, руб.</th>
    </tr>

    <?php //foreach ($model as $product): ?>
        <tr>
            <!--<td style = "align: left"><?php // Html::encode($model['id_client_order']); ?></td>
            <td style = "align: right"><?php // $con_client_model['id_product']; ?></td>
            <td style = "align: right"><?php // $con_client_model['quantity']; ?></td>
            <td style = "align: right"><?php // $con_client_model['price']; ?></td>-->
        </tr>
    <?php //endforeach; ?>

    <tr>
        <td colspan = "3" style = "align: right">Итоговая сумма</td>
        <td style = "align: right"><?php // $con_client_model['cost'] ?></td>
    </tr>
</table>