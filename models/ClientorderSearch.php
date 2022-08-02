<?php
    namespace app\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use app\models\Clientorder;

    class ClientorderSearch extends Clientorder
    {
        public function rules()
        {
            return [
                [['id_order', 'id_user', 'id_client_order', 'cost'], 'integer'],
            ];
        }

        public function scenarios()
        {
            return Model::scenarios();
        }

        public function search($params, $id)
        {
            $query = Clientorder::find()->where(['id_client_order' => $id]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_order' => $this->id_order,
                'id_client_order' => $this->id_client_order,
                'id_product' => $this->id_product,
                'id_condition' => $this->id_condition,
                'id_condition' => $this->id_user,
                'quantity' => $this->quantity,
                'cost' => $this->cost,
            ]);

            $query->orderBy(['id_order' => SORT_DESC]);

            return $dataProvider;
        }

        public function search_m($params)
        {
            $query = Clientorder::find()->where(['id_user' => \Yii::$app->user->identity->id]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_order' => $this->id_order,
                'id_client_order' => $this->id_client_order,
                'id_product' => $this->id_product,
                'id_condition' => $this->id_condition,
                'id_user' => $this->id_user,
                'quantity' => $this->quantity,
                'cost' => $this->cost,
            ]);

            $query->orderBy(['id_order' => SORT_DESC]);

            return $dataProvider;
        }

        public function search_v($params)
        {
            $query = Clientorder::find()->where(['id_order' => $id]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_order' => $this->id_order,
                'id_client_order' => $this->id_client_order,
                'id_product' => $this->id_product,
                'id_condition' => $this->id_condition,
                'id_user' => $this->id_user,
                'quantity' => $this->quantity,
                'cost' => $this->cost,
            ]);

            return $dataProvider;
        }
    }
?>