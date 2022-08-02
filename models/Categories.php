<?php
    namespace app\models;

    use yii\web\UploadedFile;
    use Yii;

    class Categories extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'product_categories';
        }

        public function rules()
        {
            return [
                ['name_product_categories', 'required'],
                ['name_product_categories', 'match', 'pattern' => '/^[а-яё]+$/isu', 'message' => 'Допустимы только русские буквы без пробелов!'],
                ['name_product_categories', 'unique'],
                [['imglink'], 'file', 'extensions' => 'png, jpg'],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id_product_categories' => 'ID категории',
                'name_product_categories' => 'Название',
                'imglink' => 'Изображение',
            ];
        }

        public $picture_now;
        public function upcategory() {
            if ($this->validate()) {
                if ($this->imglink = UploadedFile::getInstance($this, 'imglink')) {
                    $file_name = time() . '_category.' . $this->imglink->extension;

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
            Yii::$app->session->setFlash('success', "Категория успешно обновлена");
        }

        public function getProducts()
        {
            return $this->hasMany(Product::className(), ['id_product_categories' => 'id_product_categories']);
        }

        public function getUndercategories()
        {
            return $this->hasMany(Undercategories::className(), ['id_product_categories' => 'id_product_categories']);
        }
    }
?>