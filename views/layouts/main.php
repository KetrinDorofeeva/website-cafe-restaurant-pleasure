<?php
    use app\widgets\Alert;
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\widgets\Breadcrumbs;
    use app\assets\AppAsset;

    AppAsset::register($this);
    $cart = \Yii::$app->cart;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href = "https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel = "stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link  href = "https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel = "stylesheet">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">    
    <?php
        NavBar::begin([
            'brandLabel' => Html::img('/web/img/logo.png', ['style' => 'margin-top: -13px; width: 45px; border-radius: 20px']) . Html::a('PLEASURE', ['/site/index'], ['style' => 'position: relative; top: 14px; right: 5px; font-size: 18px; color: white']),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
                'style' => 'font-weight: bold; background: #222222; height: 53px; font-size: 9px'
            ],
        ]);

        echo Nav::widget([
            'options' => [
                'class' => 'navbar-nav navbar-right',
                'style' => 'margin-right: 50px'
            ],
            'items' => [
                [
                    'label' => \Yii::$app->user->identity->login,
                    'visible' => !Yii::$app->user->isGuest,
                ],
                [
                    'label' => '?????????????? ????????????????', 
                    'url' => ['/site/index'],
                ],
                [
                    'label' => '??????????', 
                    'url' => ['/site/stocks'],
                ],
                [
                    'label' => '????????', 
                    'url' => ['/site/fullmenu'],
                ],
                '<span class = "navbar-nav navbar-right" id = "basket_text">',[
                    'label' => '??????????????' . " (" . $cart->getTotalCount() . ")", 
                    'url' => ['/site/basket']
                ],'</span>',
                [
                    'label' => '?????????????????????????? ????????????', 
                    'url' => ['/site/booking'],
                ],
                [
                    'label' => '????????????', 
                    'url' => ['/site/comments'],
                ],
                [
                    'label' => '????????????????', 
                    'url' => ['/site/contact'],
                ],
                [
                    'label' => '??????????????????????', 
                    'url' => ['/site/registration'],
                    'visible' => \Yii::$app->user->isGuest,
                ],
                [
                    'label' => '??????????????????????', 
                    'url' => ['/site/login'],
                    'visible' => \Yii::$app->user->isGuest,
                ],
                [
                    'label' => '?????? ???????????? ?? ??????????????', 
                    'items' => [
                        [
                            'label' => '????????????', 
                            'url' => ['/site/myorders']
                        ],
                        [
                            'label' => '??????????????', 
                            'url' => ['/site/mybooking']
                        ],
                       
                    ],
                    'visible' => !Yii::$app->user->isGuest,
                ],
                [
                    'label' => '??????????-????????????', 
                    'items' => [
                        [
                            'label' => '?????????????????? ????????', 
                            'url' => ['/categories/index']
                        ],
                        [
                            'label' => '???????????????????????? ???????? (??????????????)', 
                            'url' => ['/undercategories/index']
                        ],
                        [
                            'label' => '????????????', 
                            'url' => ['/product/index']
                        ],
                        [
                            'label' => '?????????????????? ?? ???? ????????????', 
                            'url' => ['/order/index']
                        ],
                        [
                            'label' => '?????????????????????????????? ??????????????', 
                            'url' => ['/clientbooking/index']
                        ],
                        [
                            'label' => '??????????', 
                            'url' => ['/stocks/index']
                        ],
                        [
                            'label' => '????????????', 
                            'url' => ['/comments/index']
                        ],
                    ],
                    'visible' => \Yii::$app->user->identity->role == 1,
                ],
                [
                    'label' => '??????????', 
                    'url' => ['/site/logout'],
                    'visible' => !\Yii::$app->user->isGuest,
                ],
            ],
        ]);

        if (!\Yii::$app->user->isGuest) {
            echo "<span class = 'navbar-nav navbar-right basket'>";
                echo "<a href = '/site/basket'><img src = '/web/img/cart.png' class = 'basket_guest' style = 'margin-top: -66px; width: 38px; margin-left: 580px; border-radius: 20px'></a>";
                echo "<a href = '/site/basket'><span class = 'count_cart_user'>" . $cart->getTotalCount() . "</span></a>";
            echo "</span>";
        } else {
            echo "<span class = 'navbar-nav navbar-right basket'>";
                echo "<a href = '/site/basket'><img src = '/web/img/cart.png' class = 'basket_guest' style = 'margin-top: -66px; width: 38px; margin-left: 580px; border-radius: 20px'></a>";
                echo "<a href = '/site/basket'><span class = 'count_cart_user'>" . $cart->getTotalCount() . "</a></span>";
            echo "</span>";
        }
        
        NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class = "footer">
    <div class = "container">
        <div class = "footer_menu_block">
            <a href = "/site/index" class = "footer_menu">?????????????? ????????????????</a>
            <a href = "/site/fullmenu" class = "footer_menu">????????</a>
            <a href = "/site/booking" class = "footer_menu">?????????????????????????? ????????????</a>
            <a href = "/site/stocks" class = "footer_menu">??????????</a>
            <a href = "/site/comments" class = "footer_menu">????????????</a>
            <a href = "/site/contact" class = "footer_menu">????????????????</a>
            <a href = "/site/basket" class = "footer_menu">??????????????</a>
        </div>

        <div class = "main_information">
            <hr class = "footer_line"></hr>
            <img src = "/web/img/logo.png" style = "margin-top: -15px; width: 45px; border-radius: 20px">
            <div class = "address_phone_email">
                <span>?? 2015-2021 ??Pleasure??</span><br>
                <span>??????????-??????????????????, ?????????? ????????????????????, ?????? 7</span><br>
                <span>??????.: 8 (981) 942-53-40, ????. ??????????: cafe_restaurant_pleasure@email.com</span>
            </div>

            <div class = "operating_mode">
                <span>?????????? ????????????:</span><br>
                <span>????-???? ?? 11:00 ???? 23:00</span><br>
                <span>????-???? ?? 12:00 ???? 22:00</span>
            </div>

            <div class = "politics_agreement">
                <span>???????????????? ????????????????????????????????????</span><br>
                <span>???????????????????? ???? ?????????????????? ???????????????????????? ????????????</span>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>