<?php
    use app\models\Categories;
    
    echo "<div class = 'menu_buttons_all'>";
        foreach(Categories::find()->all() as $cat) {
            if ($cat->name_product_categories == 'Напитки') {
                echo "<a href = '/site/undercategories/$cat->id_product_categories'><button class = 'menu_buttons'>".$cat->name_product_categories."</button></a>";
            } else {
                echo "<a href = '/site/products/$cat->id_product_categories'><button class = 'menu_buttons'>".$cat->name_product_categories."</button></a>";
            }
        }
    echo "</div>";
?>