<?php
    use app\models\Stocks;
    
    echo "<div class = 'menu_buttons_stocks_all'>";
        foreach(Stocks::find()->all() as $stock) {
            echo "<a href = '/site/stocksproducts/$stock->id_stock'><button class = 'menu_buttons_stocks'>".$stock->name."</button></a>";
        }
    echo "</div>";
?>