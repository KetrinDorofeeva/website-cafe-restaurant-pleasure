<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Подкатегории меню (напитки)';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "undercategories-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div>

    <p>
        <?= Html::a('Добавить подкатегорию', ['create'], ['class' => 'btn btn-success', 'id' => 'admin-panel-button']) ?>
    </p><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [ 
            [
                'attribute' => 'name_product_undercategories',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->name_product_undercategories . "</p>";
                }
            ], 
            [
                'attribute' => 'imglink',
                'format' => 'raw',
                'value' => function($data) {
                    return '<img src = "/web/'.$data->imglink.'" class = "admin-panel_img">';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>