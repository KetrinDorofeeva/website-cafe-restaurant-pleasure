<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = $model[0]['stocks']['name'];
    $this->params['breadcrumbs'][] = ['label' => 'Акции', 'url' => ['stocks']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "products_menu">
    <div class = "jumbotron">
        <div class = "stocks_name"><?= $model[0]['stocks']['name'] ?></div>
    </div>

    <?php
        echo "<div class = 'stock_menu'>";
            $this->beginContent('@app/views/layouts/stocks.php');
                echo $content;
            $this->endContent();
        echo "</div>";
    ?>
        <div class = "stocks_block">
            <?php 
                foreach ($query as $stock) {
                    echo "<div class = 'stocks_text'>" . $stock['stocks']['description'] . "</div>";
                }
            ?>
        </div>

    <?php
        foreach ($model as $product) {
            echo "<div class = 'block_product' style = 'bottom: 40px'>";
                echo Html::img('/web/' . $product['imglink'], ['class' => 'product_img']);
                echo "<div class = block_product_title>" . $product['title'] . "</div>";
                echo "<hr class = block_product_line>";
                echo "<div class = block_product_description>" . $product['description'] . "</div>";
                echo "<div class = block_product_cpfc>" . $product['cpfc'] . "</div>";
                echo "<div class = block_product_price>" . $product['price'] . " ₽" . "</div>";
                echo "<div class = block_product_parameter>" . $product->parameter . "</div>";

                $form = ActiveForm::begin([
                    'id' => 'myform',
                    'method' => 'post',
                    'fieldConfig' => [
                        'template' => '{input}{label}{error}',
                    ],
                ]);
    ?>
                    <a href = "<?= Url::to(['/site/add', 'id' => $product->id]) ?>"><img src = "/web/img/add_product.png" class = "add_product_button"></a>
    <?php
                ActiveForm::end();
            echo "</div>";
        }
    ?>
</div>