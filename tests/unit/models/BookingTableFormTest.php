<?php
    namespace tests\unit\models;

    use app\models\ClientbookingForm;
    use yii\mail\MessageInterface;

    class BookingTableFormTest extends \Codeception\Test\Unit
    {
        protected $model;

        protected function setUp()
        {
            parent::setUp();
            $this->model = new ClientbookingForm();
        }

        //Поле "Фамилия и инициалы" обязательное
        public function testFIOIsRequired()
	    {
            $this->model->fio = '';
            $this->assertFalse($this->model->validate(array('fio')));
	    }

        //Поле "Телефон" должно быть соответствующего формата - "+7 (XXX) XXX-XX-XX"
        public function testPhoneNotCorrect()
	    {
            $this->model->phone = '79819425340';
            $this->assertFalse($this->model->validate(array('phone')));
	    }

        //Поле "E-mail" не корректный (Должен быть соответствующего формата - "XXX@yandex.ru")
        public function testEmailNotCorrect()
	    {
            $this->model->mail = 'multivebyandexru';
            $this->assertFalse($this->model->validate(array('mail')));
	    }

        //Поле "Кол-во человек" не может быть больше 15
        public function testNumberClientMoreThanNecessaryNotCorrect()
        {
            $this->model->number_client = '16';
            $this->assertFalse($this->model->validate(array('number_client')));
        }

        //Поле "Кол-во человек" не может быть меньше 1
        public function testNumberClientLessThanNecessaryNotCorrect()
        {
            $this->model->number_client = '0';
            $this->assertFalse($this->model->validate(array('number_client')));
        }

        //Дата бронирования указана в некорректном формате (должно быть yyyy-mm-dd hh:ii)
        public function testBookingDateNotCorrect()
        {
            $this->model->booking_date = '03.04.2022';
            $this->assertFalse($this->model->validate(array('booking_date')));
        }

        //Дата бронирования не может быть меньше текущего дня
        public function testBookingDateLessThanCurrentDayNotCorrect()
	    {
            $this->model->booking_date = '2022-03-04 14:25';
            $this->assertFalse($this->model->validate(array('booking_date')));
	    }

        //Дата бронирования не может быть больше 6 дней
        public function testBookingDateMoreThanNecessaryNotCorrect()
	    {
            $this->model->booking_date = '2022-03-17';
            $this->assertFalse($this->model->validate(array('booking_date')));
	    }

        //Форма бронирования столика заполнена корректно
        public function testBookingTableCorrect()
        {
            $this->model->fio = 'Дорофеева Е.А';
            $this->model->phone = '+7 (981) 942-53-40';
            $this->model->mail = 'multiveb@yandex.ru';
            $this->model->booking_date = '2022-05-20 15:30';
            $this->model->number_client = '1';
            $this->assertTrue($this->model->save());
        }
    }
?>