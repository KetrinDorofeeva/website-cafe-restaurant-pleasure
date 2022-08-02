<?php
    namespace app\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use app\models\Clientbooking;

    class ClientbookingSearch extends Clientbooking
    {
        public function rules()
        {
            return [
                [['id_booking', 'id_client_booking'], 'integer'],
            ];
        }

        public function scenarios()
        {
            return Model::scenarios();
        }

        public function search($params)
        {
            $query = Clientbooking::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_booking' => $this->id_booking,
                'id_client_booking' => $this->id_client_booking,
                'id_condition' => $this->id_condition,
            ]);

            $query->orderBy(['id_client_booking' => SORT_DESC]);

            return $dataProvider;
        }

        public function search_m($params)
        {
            $query = Clientbooking::find()->where(['id_user' => \Yii::$app->user->identity->id]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_booking' => $this->id_booking,
                'id_client_booking' => $this->id_client_booking,
                'id_user' => $this->id_user,
                'id_condition' => $this->id_condition,
            ]);

            $query->orderBy(['id_client_booking' => SORT_DESC]);

            return $dataProvider;
        }
    }
?>