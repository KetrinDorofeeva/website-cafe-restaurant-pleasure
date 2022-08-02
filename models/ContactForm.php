<?php
    namespace app\models;

    use Yii;
    use yii\base\Model;

    class ContactForm extends Model
    {
        public $name;
        public $email;
        public $subject;
        public $body;
        public $verifyCode;

        public function rules()
        {
            return [
                ['email', 'match', 'pattern' => '/^[a-zA-z0-9]+@[yandex]+\.[ru]+$/', 'message' => 'Email должен быть "...@yandex.ru"'],
                ['verifyCode', 'captcha'],
                ['name', 'required', 'message' => 'Заполните поле "Ваше имя"!'],
                ['email', 'required', 'message' => 'Заполните поле "Ваш E-mail"!'],
                ['subject', 'required', 'message' => 'Заполните поле "Тема письма"!'],
                ['body', 'required', 'message' => 'Заполните поле "Сообщение"!'],
            ];
        }

        public function attributeLabels()
        {
            return [
                'name' => 'Ваше имя',
                'email' => 'Ваш E-mail',
                'subject' => 'Тема письма',
                'body' => 'Сообщение', 
                'verifyCode' => '',
            ];
        }

        public function contact($email)
        {
            if ($this->validate()) {
                Yii::$app->mailer->compose()
                    ->setTo('multiveb@yandex.ru') //Кому отправить
                    ->setFrom(['multiveb@yandex.ru' => $this->name]) //От кого
                    ->setSubject($this->subject) //Тема сообщения
                    ->setHtmlBody($this->body. '<br><br>' . $this->email) //Текст сообщения
                    ->send(); //Отправка сообщения
    
                return true;
            }

            return false;
        }
    }
?>