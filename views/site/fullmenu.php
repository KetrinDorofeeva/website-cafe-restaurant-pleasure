<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = 'Меню';
?>

<div class = "full_menu">
    <div class = "jumbotron">
        <div class = "full_menu_text">Меню</div>
    </div>

    <?php 
        $this->beginContent('@app/views/layouts/menu.php');
            echo $content;
        $this->endContent();

        echo "<div class = big_block_categories>";
            foreach ($model as $category) {
                echo "<div class = 'categories_block'>";
                    if ($category->name_product_categories == 'Напитки') {
                        echo "<a href = '/site/undercategories/$category->id_product_categories'>" . "<div class = category_block>" . Html::img('/web/' . $category->imglink, ['class' => 'img_category_block']);
                            echo "<div class = category_block_text>" . $category->name_product_categories . "</div>";
                        echo "</div>";
                    } else {
                        echo "<a href = '/site/products/$category->id_product_categories'>" . "<div class = category_block>" . Html::img('/web/' . $category->imglink, ['class' => 'img_category_block']);
                            echo "<div class = category_block_text>" . $category->name_product_categories . "</div>";
                        echo "</div>";
                    }
                echo "</a></div>"; 
            }
        echo "</div>";
    ?>
</div>