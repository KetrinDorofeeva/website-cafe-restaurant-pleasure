<?php
    namespace app\models;

    use Yii;
    use yii\base\Model;

    class LoginForm extends Model
    {
        public $login;
        public $password;
        public $rememberMe = true;
        private $_user = false;

        public function rules()
        {
            return [
                [['login', 'password'], 'required'],
                ['rememberMe', 'boolean'],
                ['password', 'validatePassword'],
            ];
        }

        public function attributeLabels() {
            return [
                'login' => 'Логин',
                'password' => 'Пароль',
                'rememberMe' => 'Запомнить меня',
            ];
        }

        public function validatePassword($attribute, $params)
        {
            if (!$this->hasErrors()) {
                $user = $this->getUser();

                if (!$user || !$user->validatePassword($this->password)) {
                    $this->addError($attribute, 'Неверный логин или пароль!');
                }
            }
        }

        public function login()
        {
            if ($this->validate()) {
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            }
            return false;
        }

        public function getUser()
        {
            if ($this->_user === false) {
                $this->_user = User::findByUsername($this->login);
            }

            return $this->_user;
        }
    }
?>