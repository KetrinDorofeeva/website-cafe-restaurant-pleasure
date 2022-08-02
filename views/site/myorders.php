<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Мои заказы';
?>

<div class = "myorder-index">
    <div class = "jumbotron">
        <div class = "myorders_name">Мои заказы</div>
    </div>

    <div class = "table-responsive myorder-table">
        <?= GridView::widget([
            'formatter' => [
                'class' => 'yii\i18n\Formatter', 
                'nullDisplay' => '',
            ],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id_order',
                    'format' => 'raw',
                    'value' => function($data) {
                        return '<a href = "/site/vieworder?id='.$data->id_order.'"><p style = "text-align: center">' .  $data->id_order . '</p></a>';
                    }
                ],
                [
                    'attribute' => 'title',
                    'format' => 'raw',
                    'value' => function($data) {
                        return '<p style = "text-align: center">' .  $data->product->title . '</p>';
                    }
                ],
                [
                    'attribute' => 'imglink',
                    'format' => 'raw',
                    'value' => function($data) {
                        return '<img src = "/web/'.$data->product->imglink.'" class = "myorders_img">';
                    }
                ],
                [
                    'attribute' => 'cost',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->cost . " ₽</p>";
                    }
                ],
                [
                    'attribute' => 'delivery_date',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . date("d.m.Y H:i", strtotime($data->clientorderform->delivery_date)) . "</p>";
                    }
                ],
                [
                    'attribute' => 'name_condition',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->condition->name_condition . "</p>";
                    }
                ],
            ],
        ]); ?>
    </div>
</div>