<?php
    namespace app\models;

    use Yii;

    class Comments extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'comments';
        }

        public function rules()
        {
            return [
                [['text', 'id_user', 'date_and_time'], 'required'],
                [['text'], 'string'],
                [['id_user'], 'integer'],
                [['date_and_time'], 'safe'],
                [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id_comment' => 'Id Comment',
                'text' => 'Комментарии',
                'id_user' => 'Комментаторы',
                'date_and_time' => 'Дата и время',
            ];
        }

        public function getUser()
        {
            return $this->hasOne(User::className(), ['id' => 'id_user']);
        }
    }
?>