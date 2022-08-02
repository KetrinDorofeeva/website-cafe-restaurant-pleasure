<?php
    namespace app\models;

    use Yii;

    class Booking extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'client_booking';
        }

        public function getClientbookings()
        {
            return $this->hasMany(Clientbooking::className(), ['id_client_booking' => 'id_client_booking']);
        }

        public function getUser()
        {
            return $this->hasOne(User::className(), ['id' => 'id_user']);
        }
    }
?>