<?php
    namespace app\models;

    use Yii;
    use yii\base\Model;
    use yii\db\ActiveRecord;

    class Cartproduct extends ActiveRecord {
        public static function tableName() {
            return 'product';
        }
    }
?>