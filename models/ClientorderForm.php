<?php
    namespace app\models;

    use Yii;
    use yii\base\Model;
    use yii\db\ActiveRecord;

    class ClientorderForm extends ActiveRecord {
        public static function tableName() {
            return 'client_order';
        }

        public $operator;

        public function attributeLabels() {
            return [
                'fio' => 'Фамилия и инициалы',
                'phone' => 'Телефон',
                'mail' => 'E-mail',
                'address' => 'Адрес доставки',
                'dop_info' => 'Комментарий (дополнительная информация)',
                'delivery_date' => 'Дата и время доставки',
                'operator' => 'Я хочу, чтобы мне позвонил оператор'
            ];
        }

        public function rules() {
            return [
                ['fio', 'required', 'message' => 'Заполните поле "Фамилия и инициалы"!'],
                ['fio', 'match', 'pattern' => '/^[а-яё.\s]+$/isu', 'message' => 'Допустимы только русские буквы и точки!'],
                ['phone', 'required', 'message' => 'Заполните поле "Телефон"!'],
                ['phone', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => 'Ваш номер должен соответствовать формату: "+7 (XXX) XXX-XX-XX"!' ],
                ['mail', 'email'],
                ['mail', 'required', 'message' => 'Заполните поле "E-mail"!'],
                ['delivery_date', 'required', 'message' => 'Выберите дату и время доставки!'],
                ['delivery_date', 'datetime', 'format' => 'php:Y-m-d H:i'],
                ['delivery_date', 'myBookingDate'],
                ['address', 'required', 'message' => 'Заполните поле "Адрес доставки"!'],
                ['address', 'match', 'pattern' => '/^[а-яё0-9_\-.,\s]+$/isu', 'message' => 'Допустимы только русские буквы, цифры, точки, запятые и дефисы!'],
                ['dop_info', 'match', 'pattern' => '/^[а-яё0-9.,\s]+$/isu', 'message' => 'Допустимы только русские буквы, цифры, точки и запятые!'],
                ['operator', 'safe'],
            ];
        }

        public function myBookingDate($attribute, $params) {
            if (!$this->hasErrors()) {
                $date_now = new \DateTime();
                $book_date = new \DateTime($this->delivery_date);
                $interval = date_diff($date_now, $book_date);

                if ($book_date < $date_now) {
                    $this->addError($attribute, 'День достаки не может быть меньше сегодняшнего дня!');
                }

                if ($interval->d >= 7) {
                    $this->addError($attribute, 'На такой период нельзя сделать заказ!');
                }
            }
        }
    }
?>