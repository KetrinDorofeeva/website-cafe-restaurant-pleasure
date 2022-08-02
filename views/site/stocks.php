<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Акции';
?>

<div class = "full_menu">
    <div class = "jumbotron">
        <div class = "full_menu_text">Акции</div>
    </div>

    <?php
        echo "<div style = 'position: relative; right: 50px'>";
            $this->beginContent('@app/views/layouts/stocks.php');
                echo $content;
            $this->endContent();
        echo "</div>";

        foreach ($model as $stock) {
            echo "<div class = 'stocks_block_categories'>";
                echo "<a href = '/site/stocksproducts/$stock->id_stock'>" . "<div class = 'category_block'>" . Html::img('/web/' . $stock->imglink, ['class' => 'img_category_block']);
                    echo "<div class = 'stock_block_text'>" . $stock->name . "</div>";
                echo "</div>";
            echo "</a></div>"; 
        }
    ?>
</div>