<?php
    namespace app\models;

    use Yii;
    use yii\base\Model;
    use yii\db\ActiveRecord;

    class ClientbookingForm extends ActiveRecord {
        public static function tableName() {
            return 'client_booking';
        }

        public $operator;

        public function attributeLabels() {
            return [
                'fio' => 'Фамилия и инициалы',
                'phone' => 'Телефон',
                'mail' => 'E-mail',
                'booking_date' => 'Дата и время бронирования',
                'number_client' => 'Кол-во человек',
                'wishes' => 'Пожелания к бронированию',
                'operator' => 'Я хочу, чтобы мне позвонил оператор'
            ];
        }

        public function rules() {
            return [
                ['fio', 'required', 'message' => 'Заполните поле "Фамилия и инициалы"!'],
                [['fio'], 'match', 'pattern' => '/^[а-яё.\s]+$/isu', 'message' => 'Допустимы только русские буквы и точки!'],
                ['phone', 'required', 'message' => 'Заполните поле "Телефон"!'],
                ['phone', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => 'Ваш номер должен соответствовать формату: "+7 (XXX) XXX-XX-XX"!' ],
                ['mail', 'required', 'message' => 'Заполните поле "E-mail"!'],
                ['mail', 'email'],
                ['booking_date', 'required', 'message' => 'Выберите дату и время бронирования!'],
                ['booking_date', 'datetime', 'format' => 'php:Y-m-d H:i'],
                ['booking_date', 'myBookingDate'],
                ['number_client', 'required', 'message' => 'Заполните поле "Кол-во человек"!'],
                ['number_client', 'integer', 'min' => 1, 'max' => 15],
                ['wishes', 'match', 'pattern' => '/^[а-яё0-9.,\s]+$/isu', 'message' => 'Допустимы только русские буквы, цифры, точки и запятые!'],
                ['operator', 'safe'],
            ];
        }

        public function myBookingDate($attribute, $params) {
            if (!$this->hasErrors()) {
                $date_now = new \DateTime();
                $book_date = new \DateTime($this->booking_date);
                $interval = date_diff($date_now, $book_date);

                if ($book_date < $date_now) {
                    $this->addError($attribute, 'Дата бронирования не может быть меньше сегодняшнего дня!');
                }

                if ($interval->d >= 7) {
                    $this->addError($attribute, 'Нельзя забронировать столик!');
                }
            }
        }
    }
?>