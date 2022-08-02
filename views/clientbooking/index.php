<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Забронированные столики';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "clientbooking-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <div class = "table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            
            'columns' => [
                [
                    'attribute' => 'id_booking',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->id_booking. "</p>";
                    }
                ],
                [
                    'attribute' => 'fio',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->booking->fio. "</p>";
                    }
                ],
                [
                    'attribute' => 'login',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->booking->user->login. "</p>";
                    }
                ],
                [
                    'attribute' => 'phone',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->booking->phone;
                    }
                ],
                [
                    'attribute' => 'mail',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->booking->mail;
                    }
                ],
                [
                    'attribute' => 'booking_date',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . date('d.m.Y H:i', strtotime($data->booking->booking_date)) . "</p>";
                    }
                ],
                [
                    'attribute' => 'number_client',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->booking->number_client. "</p>";
                    }
                ],
                [
                    'attribute' => 'wishes',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->booking->wishes. "</p>";
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
                        return '<a href = "/clientbooking/waitingbooking?id='.$data->id_booking.'" style = "font-weight: bold">' . "ОЖИДАЮТ / " . '</a>'
                            . '<a href = "/clientbooking/inprogressbooking?id='.$data->id_booking.'" style = "font-weight: bold">' . "В ПРОЦЕССЕ / " . '</a>'
                            . '<a href = "/clientbooking/donebooking?id='.$data->id_booking.'" style = "font-weight: bold">' . "ГОТОВО" . '</a>';
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