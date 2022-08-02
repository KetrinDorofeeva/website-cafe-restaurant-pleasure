<?php
    namespace app\models;

    use Yii;

    class Conditions extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'conditions';
        }

        public function rules()
        {
            return [
                [['name_condition'], 'required'],
                [['name_condition'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id_condition' => 'ID статуса',
                'name_condition' => 'Название статуса',
            ];
        }

        public function getConClientbookings()
        {
            return $this->hasMany(ConClientBooking::className(), ['id_condition' => 'id_condition']);
        }

        public function getConClientOrders()
        {
            return $this->hasMany(ConClientOrder::className(), ['id_condition' => 'id_condition']);
        }
    }
?>