<?php
    /*namespace tests\unit\models;

    use app\models\Product;
    use yii\web\UploadedFile;
    use yii\mail\MessageInterface;

    class ProductFormTest extends \Codeception\Test\Unit
    {
        protected $model;

        protected function setUp()
        {
            parent::setUp();
            $this->model = new Product();
        }

        //Создание товара прошло успешно
        public function testCreateProductCorrect()
	    {            
            $this->model->title = 'Шоколадный коктейль "Чудо"';
            $this->model->imglink = 'document.jpg';
            $this->model->description = 'Молочно-шоколадный коктейль';
            $this->model->cpfc = 'Калорийность: 70 Ккал. Белки: 3. Жиры: 2. Углеводы: 10.';
            $this->model->parameter = '1 л';
            $this->model->id_product_categories = '7';
            $this->model->id_product_undercategories = '3';
            $this->model->quantity = '30';
            $this->model->price = '100';
            expect_that($this->model->save(false));
	    }

        //Обязательные поля пустые
        public function testRequiredFieldsEmpty()
	    {            
            $this->model->title = '';
            $this->model->imglink = '';
            $this->model->description = '';
            $this->model->cpfc = '';
            $this->model->parameter = '';
            $this->model->id_product_categories = '';
            $this->model->id_product_undercategories = '';
            $this->model->quantity = '';
            $this->model->price = '';
            $this->assertFalse($this->model->save());
	    }
    }*/
?>