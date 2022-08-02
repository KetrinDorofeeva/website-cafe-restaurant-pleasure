<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Акции';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "stocks-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div>

    <p>
        <?= Html::a('Добавить акцию', ['create'], ['class' => 'btn btn-success', 'id' => 'admin-panel-button']) ?>
    </p><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [ 
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->name . "</p>";
                }
            ], 
            [
                'attribute' => 'imglink',
                'format' => 'raw',
                'value' => function($data) {
                    return '<img src = "/web/'.$data->imglink.'" class = "admin-panel_img">';
                }
            ],
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>