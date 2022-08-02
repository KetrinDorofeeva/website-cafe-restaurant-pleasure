<?php
    namespace app\models;

    use Yii;

    class Clientorder extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'con_client_order';
        }

        public function rules()
        {
            return [
                [['id_client_order', 'id_product', 'id_condition', 'quantity', 'cost'], 'required'],
                [['id_client_order', 'id_product', 'id_condition', 'quantity', 'cost'], 'integer'],
                [['id_client_order'], 'exist', 'skipOnError' => true, 'targetClass' => ClientOrder::className(), 'targetAttribute' => ['id_client_order' => 'id_client_order']],
                [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
                [['id_condition'], 'exist', 'skipOnError' => true, 'targetClass' => Conditions::className(), 'targetAttribute' => ['id_condition' => 'id_condition']],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id_order' => 'Номер',
                'id_product' => 'Товар',
                'id_condition' => 'Статус',
                'quantity' => 'Количество',
                'cost' => 'Стоимость',

                'title' => 'Название',
                'imglink' => 'Изображение',
                'description' => 'Описание',
                'cpfc' => 'Калорийность (б. ж. у.)',
                'parameter' => 'Параметры',
                'delivery_date' => 'Дата и время доставки',
                'name_condition' => 'Статус'
            ];
        }

        public function getClientOrder()
        {
            return $this->hasOne(ClientOrder::className(), ['id_client_order' => 'id_client_order']);
        }

        public function getClientorderform()
        {
            return $this->hasOne(ClientorderForm::className(), ['id_client_order' => 'id_client_order']);
        }

        public function getProduct()
        {
            return $this->hasOne(Product::className(), ['id' => 'id_product']);
        }

        public function getCondition()
        {
            return $this->hasOne(Conditions::className(), ['id_condition' => 'id_condition']);
        }
    }
?>