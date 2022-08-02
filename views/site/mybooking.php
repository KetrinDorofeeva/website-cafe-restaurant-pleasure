<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Мои столики';
?>

<div class = "mybooking-index">
    <div class = "jumbotron">
        <div class = "mybooking_name">Мои столики</div>
    </div>

    <div class = "table-responsive myorder-table">
        <?= GridView::widget([
            'formatter' => [
                'class' => 'yii\i18n\Formatter', 
                'nullDisplay' => '',
            ],
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'id_booking',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>".$data->id_booking."</p>";
                    }
                ],
                [
                    'attribute' => 'booking_date',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" .  date("d.m.Y H:i", strtotime($data->booking->booking_date)) . "</p>";
                    }
                ],
                [
                    'attribute' => 'number_client',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->booking->number_client . "</p>";
                    }
                ],
                [
                    'attribute' => 'id_condition',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->condition->name_condition . "</p>";
                    }
                ],
            ],
        ]); ?>
    </div>
</div>