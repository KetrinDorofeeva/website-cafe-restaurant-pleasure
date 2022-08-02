<?php
    namespace app\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use app\models\Comments;

    class CommentsSearch extends Comments
    {
        public function rules()
        {
            return [
                [['id_comment'], 'integer'],
                [['date_and_time'], 'safe'],
            ];
        }

        public function scenarios()
        {
            return Model::scenarios();
        }

        public function search($params)
        {
            $query = Comments::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_comment' => $this->id_comment,
                'id_user' => $this->id_user,
                'date_and_time' => $this->date_and_time,
            ]);

            $query->andFilterWhere(['like', 'text', $this->text]);
            $query->orderBy(['date_and_time' => SORT_DESC]);

            return $dataProvider;
        }
    }
?>