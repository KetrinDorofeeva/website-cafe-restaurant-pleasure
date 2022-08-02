<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Категории меню';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "product-categories-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success', 'id' => 'admin-panel-button']) ?>
    </p><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'name_product_categories',
                'format' => 'raw',
                'value' => function($data) {
                    return "<p style = 'text-align: center'>" . $data->name_product_categories . "</p>";
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