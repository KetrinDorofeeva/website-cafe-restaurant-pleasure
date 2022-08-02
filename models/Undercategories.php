<?php
    namespace app\models;

    use yii\web\UploadedFile;
    use Yii;

    class Undercategories extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'product_undercategories';
        }

        public function rules()
        {
            return [
                [['name_product_undercategories'], 'required'],
                ['name_product_undercategories', 'match', 'pattern' => '/^[а-яё]+$/isu', 'message' => 'Допустимы только русские буквы без пробелов!'],
                ['name_product_undercategories', 'unique'],
                [['imglink'], 'file', 'extensions' => 'png, jpg'],
                [['name_product_undercategories'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id_product_undercategories' => 'ID подкатегории',
                'name_product_undercategories' => 'Название',
                'imglink' => 'Изображение',
                'id_product_categories' => 'Название категории',
            ];
        }

        public $picture_now;
        public function upundercategory() {
            if ($this->validate()) {
                if ($this->imglink = UploadedFile::getInstance($this, 'imglink')) {
                    $file_name = time() . '_undercategory.' . $this->imglink->extension;

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
            Yii::$app->session->setFlash('success', "Подкатегория успешно обновлена");
        }

        public function getProducts()
        {
            return $this->hasMany(Product::className(), ['id_product_undercategories' => 'id_product_undercategories']);
        }

        public function getCategories()
        {
            return $this->hasOne(Categories::className(), ['id_product_categories' => 'id_product_categories']);
        }
    }
?>