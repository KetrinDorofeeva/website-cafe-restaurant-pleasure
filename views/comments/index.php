<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Отзывы';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "comments-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            'text:ntext',
            [
                'attribute' => 'id_user',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->user->login . "</p>";
                }
            ],
            [
                'attribute' => 'date_and_time',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . date("d.m.Y H:i", strtotime($data->date_and_time)) . "</p>";
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ], 
        ],
    ]); ?>
</div>