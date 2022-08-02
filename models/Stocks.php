<?php
    namespace app\models;

    use Yii;
    use yii\web\UploadedFile;

    class Stocks extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'stocks';
        }

        public function rules()
        {
            return [
                [['name', 'description'], 'required'],
                [['name'], 'string', 'max' => 255],
                ['name', 'match', 'pattern' => '/^[а-яё\s]+$/isu', 'message' => 'Допустимы только русские буквы!'],
                ['name', 'unique'],
            ];
        }

        public function attributeLabels()
        {
            return [
                'name' => 'Название',
                'description' => 'Описание',
                'imglink' => 'Изображение',
            ];
        }

        public $picture_now;
        public function upstock() {
            if ($this->validate()) {
                if ($this->imglink = UploadedFile::getInstance($this, 'imglink')) {
                    $file_name = time() . '_stocks.' . $this->imglink->extension;

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
            Yii::$app->session->setFlash('success', "Акция успешно обновлена");
        }

        public function getProducts()
        {
            return $this->hasMany(Product::className(), ['id_stock' => 'id_stock']);
        }
    }
?>