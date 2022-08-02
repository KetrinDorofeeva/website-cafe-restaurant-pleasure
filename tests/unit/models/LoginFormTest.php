<?php
    /*namespace tests\unit\models;

    use app\models\LoginForm;

    class LoginFormTest extends \Codeception\Test\Unit
    {
        private $model;

        //Неправильные логин и пароль
        public function testNoUser()
        {
            $this->model = new LoginForm([
                'login' => 'not_existing_login',
                'password' => 'not_existing_password',
            ]);

            expect_not($this->model->login());
            expect_that(\Yii::$app->user->isGuest);
        }

        //Неправильный пароль
        public function testWrongPassword()
        {
            $this->model = new LoginForm([
                'login' => 'admin',
                'password' => 'wrong_password',
            ]);

            expect_not($this->model->login());
            expect_that(\Yii::$app->user->isGuest);
        }

        //Некорректные логин и пароль (должны быть только латинские символы и цифры)
        public function testWrongLoginAndPassword()
        {
            $this->model = new LoginForm([
                'login' => 'Админ',
                'password' => '?%№%?&!',
            ]);

            expect_not($this->model->login());
            expect_that(\Yii::$app->user->isGuest);
        }

        //Корректные логин и пароль
        public function testLoginAndPasswordCorrect()
        {
            $this->model = new LoginForm([
                'login' => 'admin',
                'password' => '123',
            ]);

            expect_that($this->model->login());
            expect_not(\Yii::$app->user->isGuest);
        }
    }*/
?>