<?php
    namespace app\models;
    use yii\db\ActiveRecord;

    class User extends ActiveRecord implements \yii\web\IdentityInterface
    {
        public static function tableName() {
            return 'user';
        }

        public static function findIdentity($id)
        {
            return static::findOne($id);
        }

        public static function findIdentityByAccessToken($token, $type = null)
        {

        }

        public static function findByUsername($login)
        {
            return static::findOne(['login' => $login]);
        }

        public function getId()
        {
            return $this->id;
        }

        public function getAuthKey()
        {
            return $this->auth_key;
        }

        public function validateAuthKey($authKey)
        {
            return $this->auth_key === $authKey;
        }

        public function validatePassword($password)
        {
            return $this->password === md5($password);
        }
    }
?>