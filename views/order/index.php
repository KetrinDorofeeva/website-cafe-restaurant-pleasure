<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Заказчики и их заказы';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "order-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <div class = "table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'fio',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->fio. "</p>";
                    }
                ], 
                [
                    'attribute' => 'login',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->user->login. "</p>";
                    }
                ], 
                'phone',
                'mail',
                'address:ntext',
                'dop_info:ntext',
                [
                    'attribute' => 'delivery_date',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . date("d.m.Y H:i", strtotime($data->delivery_date)) . "</p>";
                    }
                ], 
                [
                    'attribute' => 'Заказы',
                    'format' => 'raw',
                    'value' => function($data) {
                        return '<a href = "/clientorder/index?id='. $data->id_client_order .'" style = "font-weight: bold">' . "Посмотреть заказы" . '</a>';
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}'
                ],
            ],
        ]); ?>
    </div>
</div>