<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Заказы клиента';
    $this->params['breadcrumbs'][] = ['label' => 'Заказчики и их заказы', 'url' => ['order/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "clientorder-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            [
                'attribute' => 'id_order',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->id_order . "</p>";
                }
            ],
            [
                'attribute' => 'id_product',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->product->title . "</p>";
                }
            ],
            [
                'attribute' => 'quantity',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->quantity . " шт.</p>";
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
                'attribute' => 'id_condition',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->condition->name_condition . "</p>";
                }
            ],
            [
                'attribute' => 'Назначить статус',
                'format' => 'raw',
                'value' => function($data) {
                    return '<a href = "/clientorder/waitingproduct?id='.$data->id_order.'" style = "font-weight: bold">' . "ОЖИДАЮТ / " . '</a>'
                           . '<a href = "/clientorder/inprogressproduct?id='.$data->id_order.'" style = "font-weight: bold">' . "В ПРОЦЕССЕ / " . '</a>'
                           . '<a href = "/clientorder/doneproduct?id='.$data->id_order.'" style = "font-weight: bold">' . "ГОТОВО" . '</a>';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>
</div>