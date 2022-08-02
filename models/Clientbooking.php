<?php
    namespace app\models;

    use Yii;

    class Clientbooking extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'con_client_booking';
        }

        public function rules()
        {
            return [
                [['id_client_booking', 'id_condition'], 'required'],
                [['id_client_booking', 'id_condition'], 'integer'],
                [['id_client_booking'], 'exist', 'skipOnError' => true, 'targetClass' => ClientBooking::className(), 'targetAttribute' => ['id_client_booking' => 'id_client_booking']],
                [['id_condition'], 'exist', 'skipOnError' => true, 'targetClass' => Conditions::className(), 'targetAttribute' => ['id_condition' => 'id_condition']],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id_booking' => 'Номер',
                'fio' => 'ФИО',
                'phone' => 'Телефон',
                'mail' => 'E-mail',
                'booking_date' => 'Дата и время',
                'number_client' => 'Кол-во человек',
                'wishes' => 'Пожелания',
                'id_condition' => 'Статус',
                'login' => 'Логин'
            ];
        }

        public function getClientBooking()
        {
            return $this->hasOne(ClientBooking::className(), ['id_client_booking' => 'id_client_booking']);
        }

        public function getBooking()
        {
            return $this->hasOne(Booking::className(), ['id_client_booking' => 'id_client_booking']);
        }

        public function getCondition()
        {
            return $this->hasOne(Conditions::className(), ['id_condition' => 'id_condition']);
        }

        public function getUser()
        {
            return $this->hasOne(User::className(), ['id' => 'id_user']);
        }
    }
?>