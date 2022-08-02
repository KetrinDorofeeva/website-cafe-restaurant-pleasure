<?php
    namespace app\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use app\models\Stocks;

    class StocksSearch extends Stocks
    {
        public function rules()
        {
            return [
                [['id_stock'], 'integer'],
                [['name'], 'safe'],
            ];
        }

        public function scenarios()
        {
            return Model::scenarios();
        }

        public function search($params)
        {
            $query = Stocks::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_stock' => $this->id_stock,
            ]);

            $query->andFilterWhere(['like', 'name', $this->name])
                ->orderBy(['id_stock' => SORT_DESC]);

            return $dataProvider;
        }
    }
?>