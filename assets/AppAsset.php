<?php
    namespace app\assets;

    use yii\web\AssetBundle;

    class AppAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl = '@web';
        public $css = [
            'css/site.css',
        ];
        public $js = [
            'https://api-maps.yandex.ru/2.1?apikey=51785512-ffbb-44c5-9044-7f1ab310d38e&lang=ru_RU',
            'js/script.js',
        ];
        public $depends = [
            'yii\web\YiiAsset',
            'yii\bootstrap\BootstrapAsset',
        ];
    }
?>