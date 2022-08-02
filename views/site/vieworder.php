<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\widgets\ActiveForm;

    $this->title = 'Заказ: ' . $model->id_order;
    $this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['myorders']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    th {
        text-align: left;
    }
</style>

<div class = "vieworder-index">
    <div class = "jumbotron">
        <h1 style = "position: relative; color: #E8AB84; font-weight: bold; font-size: 50px; bottom: 40px">Заказ <?= $model->id_order ?></h1>
    </div>

    <div style = "position:relative; bottom: 90px">
        <?= 
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->product->title ;
                        }
                    ],
                    [
                        'attribute' => 'imglink',
                        'format' => 'raw',
                        'value' => function($data) {
                            return '<img src = "/web/'.$data->product->imglink.'" width = "150">';
                        }
                    ],
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->product->description;
                        }
                    ],
                    [
                        'attribute' => 'cpfc',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->product->cpfc;
                        }
                    ],
                    [
                        'attribute' => 'parameter',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->product->parameter;
                        }
                    ],
                    [
                        'attribute' => 'quantity',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->quantity . " шт.";
                        }
                    ],
                    [
                        'attribute' => 'cost',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->cost . " ₽";
                        }
                    ],
                    [
                        'attribute' => 'delivery_date',
                        'format' => 'raw',
                        'value' => function($data) {
                            return date("d.m.Y H:i", strtotime($data->clientorderform->delivery_date));
                        }
                    ],
                    [
                        'attribute' => 'name_condition',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->condition->name_condition;
                        }
                    ],
                ],
            ]);
        ?>
    </div>
</div>