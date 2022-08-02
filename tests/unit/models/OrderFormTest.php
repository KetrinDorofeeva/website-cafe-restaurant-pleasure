<?php
    /*namespace tests\unit\models;

    use app\models\ClientorderForm;
    use yii\mail\MessageInterface;

    class OrderFormTest extends \Codeception\Test\Unit
    {
        protected $model;

        protected function setUp()
        {
            parent::setUp();
            $this->model = new ClientorderForm();
        }

        //Поле "Фамилия и инициалы" заполнено корректно
        public function testFIOCorrect()
	    {
            $this->model->fio = 'Дорофеева Е.А';
            $this->assertTrue($this->model->validate(array('fio')));
	    }

        //Поле "Фамилия и инициалы" заполнено некорректно (Могут быть только русские символы и точки)
        public function testFIONotCorrect()
	    {
            $this->model->fio = 'Dorofeeva 5.1';
            $this->assertFalse($this->model->validate(array('fio')));
	    }

        //Поле "Телефон" корректное
        public function testPhoneCorrect()
        {
            $this->model->phone = '+7 (981) 942-53-40';
            $this->assertTrue($this->model->validate(array('phone')));
        }

        //Поле "Телефон" некорректное (Должен быть соответствующего формата - "+7 (XXX) XXX-XX-XX")
        public function testPhoneNotCorrect()
	    {
            $this->model->phone = '79819425340';
            $this->assertFalse($this->model->validate(array('phone')));
	    }

        //Поле "E-mail" корректное
        public function testEmailCorrect()
        {
            $this->model->mail = 'multiveb@yandex.ru';
            $this->assertTrue($this->model->validate(array('mail')));
        }

        //Поле "E-mail" некорректное (Должно быть соответствующего формата - "XXX@yandex.ru")
        public function testEmailNotCorrect()
	    {
            $this->model->mail = 'multivebyandexru';
            $this->assertFalse($this->model->validate(array('mail')));
	    }

        //Дата заказа не может быть больше 6 дней
        public function testOrderDateAndTimeMoreThanNecessaryNotCorrect()
        {
            $this->model->delivery_date = '2022-07-20 12:15';
            $this->assertTrue($this->model->validate(array('delivery_date')));
        }

        //Дата заказа указана в некорректном формате (должно быть yyyy-mm-dd hh:ii)
        public function testOrderDateAndTimeNotCorrect()
        {
            $this->model->delivery_date = '20.06 12:15';
            $this->assertFalse($this->model->validate(array('delivery_date')));
        }

        //Дата заказа не может быть меньше текущего дня
        public function testOrderDateAndTimeLessThanCurrentDayNotCorrect()
        {
            $this->model->delivery_date = '2022-05-15 12:25';
            $this->assertFalse($this->model->validate(array('delivery_date')));
        }

        //Поле "Адрес доставки" некорректное (Могут быть только русские символы, цифры, точки и запятые)
        public function testAddressNotCorrect()
        {
            $this->model->address = 'Фрунзенс%кий район, улица Great!, дом 6, квар*тира 54';
            $this->assertFalse($this->model->validate(array('address')));
        }

        //Форма оформления заказа оформлена успешно
        public function testOrderCorrect()
        {
            $this->model->fio = 'Дорофеева Е.А';
            $this->model->phone = '+7 (981) 942-53-40';
            $this->model->mail = 'multiveb@yandex.ru';
            $this->model->address = 'Фрунзенский район, улица Солнечная, дом 35, квартира 13';
            $this->model->delivery_date = '2022-05-20 15:30';
            $this->assertTrue($this->model->save());
        }

        //Обязательные поля пустые
        public function testRequiredFieldsEmpty()
        {
            $this->model->fio = '';
            $this->model->phone = '';
            $this->model->mail = '';
            $this->model->address = '';
            $this->model->dop_info = 'Побыстрее';
            $this->model->delivery_date = '';
            $this->assertFalse($this->model->save());
        }
    }*/
?>