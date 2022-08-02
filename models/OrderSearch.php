<?php
    namespace app\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use app\models\Order;

    class OrderSearch extends Order
    {
        public function rules()
        {
            return [
                [['id_client_order', 'id_user'], 'integer'],
                [['fio', 'phone', 'mail', 'address'], 'safe'],
            ];
        }

        public function scenarios()
        {
            return Model::scenarios();
        }

        public function search($params)
        {
            $query = Order::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;
            
            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_client_order' => $this->id_client_order,
                'id_user' => $this->id_user,
                'delivery_date' => $this->delivery_date,
            ]);

            $query->andFilterWhere(['like', 'fio', $this->fio])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'mail', $this->mail])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'dop_info', $this->dop_info])
                ->orderBy(['id_client_order' => SORT_DESC]);

            return $dataProvider;
        }
    }
?>