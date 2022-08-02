<?php
    namespace app\models;

    use yii\web\UploadedFile;
    use Yii;

    class Product extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'product';
        }

        public function rules()
        {
            return [
                [['title', 'description', 'cpfc', 'parameter', 'id_product_categories', 'quantity', 'price'], 'required'],
                ['title', 'match', 'pattern' => '/^[а-яё\s]+$/isu', 'message' => 'Допустимы только русские буквы!'],
                ['title', 'unique'],
                [['imglink'], 'file', 'extensions' => 'png, jpg'],
                [['id_product_categories', 'id_product_undercategories', 'quantity', 'price'], 'integer'],
                ['id_stock', 'safe'],
                [['title', 'description'], 'string', 'max' => 255],
                [['id_product_categories'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['id_product_categories' => 'id_product_categories']],
                [['id_product_undercategories'], 'exist', 'skipOnError' => true, 'targetClass' => Undercategories::className(), 'targetAttribute' => ['id_product_undercategories' => 'id_product_undercategories']],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID товара',
                'title' => 'Название',
                'imglink' => 'Изображение',
                'description' => 'Описание', 
                'parameter' => 'Параметр',
                'cpfc' => 'Калорийность',
                'id_product_categories' => 'Категория',
                'id_product_undercategories' => 'Подкатегория',
                'id_stock' => 'Акция',
                'quantity' => 'Количество',
                'price' => 'Стоимость',
            ];
        }

        public $picture_now;
        public function upproduct() {
            if ($this->validate()) {
                if ($this->imglink = UploadedFile::getInstance($this, 'imglink')) {
                    $file_name = time() . '_product.' . $this->imglink->extension;

                    if ($this->imglink->saveAs('uploads/' . $file_name)) {
                        if (file_exists($this->picture_now)) {
                            unlink($this->picture_now);
                        }
                        $this->imglink = 'uploads/' . $file_name;
                    }
                } else {
                    $this->imglink = $this->picture_now;
                }
            }
            $this->save(false);
            Yii::$app->session->setFlash('success', "Товар успешно обновлен");
        }

        public function getConClientOrders()
        {
            return $this->hasMany(ConClientOrder::className(), ['id_product' => 'id']);
        }

        public function getCategories()
        {
            return $this->hasOne(Categories::className(), ['id_product_categories' => 'id_product_categories']);
        }

        public function getUndercategories()
        {
            return $this->hasOne(Undercategories::className(), ['id_product_undercategories' => 'id_product_undercategories']);
        }

        public function getStocks()
        {
            return $this->hasOne(Stocks::className(), ['id_stock' => 'id_stock']);
        }
    }
?>