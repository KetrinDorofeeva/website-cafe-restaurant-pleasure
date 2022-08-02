<?php
    namespace app\models;

    use Yii;

    class Order extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'client_order';
        }

        public function rules()
        {
            return [
                [['fio', 'phone', 'mail', 'address', 'delivery_date'], 'required'],
                [['address', 'dop_info'], 'string'],
                [['delivery_date'], 'safe'],
                [['fio', 'phone', 'mail'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id_client_order' => 'ID заказчика',
                'fio' => 'ФИО заказчика',
                'phone' => 'Телефон',
                'mail' => 'E-mail',
                'address' => 'Адрес доставки',
                'dop_info' => 'Комментарий',
                'delivery_date' => 'Дата и время доставки',
                'login' => 'Логин'
            ];
        }

        public function getConClientOrders()
        {
            return $this->hasMany(Clientorder::className(), ['id_client_order' => 'id_client_order']);
        }

        public function getUser()
        {
            return $this->hasOne(User::className(), ['id' => 'id_user']);
        }
    }
?>