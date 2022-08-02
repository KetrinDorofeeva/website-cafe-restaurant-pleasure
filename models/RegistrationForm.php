<?php
    namespace app\models;

    use Yii;
    use yii\base\Model;
    use yii\db\ActiveRecord;
    use app\models\User;

    class RegistrationForm extends ActiveRecord {
        public static function tableName() {
            return 'user';
        }

        public function attributeLabels() {
            return [
                'login' => 'Логин',
                'password' => 'Пароль',
                'confirm_password' => 'Повторите пароль',
            ];
        }

        public $confirm_password;

        public function rules() {
            return [
                [['login', 'password', 'confirm_password'], 'required'],
                ['login', 'unique'],
                ['password', 'match', 'pattern' => '/^\S*(?=\S{8,12})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', 'message' => 'Пароль от 8 до 12 символов должен содержать хотя бы одну большую букву, одну маленькую букву и одну цифру'],
                ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
            ];
        }

        public function registration() {
            if ($this->validate()) {
                $this->password = md5($this->password);
                $this->role = 2;

                if ($this->save(false)) {
                    if (Yii::$app->user->login(User::findIdentity($this->id), 3600 * 24 * 30)) {
                        return true;
                    }
                }
            }

            return false;
        }
    }
?>