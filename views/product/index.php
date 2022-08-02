<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Товары';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "add_product-index">
    <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success', 'id' => 'admin-panel-button']) ?>
    </p><br>

    <div class = "table-responsive">
        <?= GridView::widget([
            'formatter' => [
                'class' => 'yii\i18n\Formatter', 
                'nullDisplay' => '',
            ],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'title',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->title . "</p>";
                    }
                ],
                [
                    'attribute' => 'imglink',
                    'format' => 'raw',
                    'value' => function($data) {
                        return '<img src = "/web/'.$data->imglink.'" class = "myorders_img">';
                    }
                ],
                'description',
                'cpfc',
                [
                    'attribute' => 'parameter',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->parameter . "</p>";
                    }
                ],
                [
                    'attribute' => 'id_product_categories',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->categories->name_product_categories . "</p>";
                    }
                ],
                [
                    'attribute' => 'id_product_undercategories',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->undercategories->name_product_undercategories . "</p>";
                    }
                ],
                [
                    'attribute' => 'id_stock',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->stocks->name . "</p>";
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
                    'attribute' => 'price',
                    'format' => 'raw',
                    'value' => function($data) {
                        return "<p style = 'text-align: center'>" . $data->price . " ₽</p>";
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn'
                ],
            ],
        ]); ?>
    </div>
</div>