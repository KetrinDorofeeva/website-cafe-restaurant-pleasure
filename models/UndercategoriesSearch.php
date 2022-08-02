<?php
    namespace app\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use app\models\Undercategories;

    class UndercategoriesSearch extends Undercategories
    {
        public function rules()
        {
            return [
                [['id_product_undercategories', 'id_product_categories'], 'integer'],
                [['name_product_undercategories'], 'safe'],
            ];
        }

        public function scenarios()
        {
            return Model::scenarios();
        }

        public function search($params)
        {
            $query = Undercategories::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->pagination->pageSize = 10;

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id_product_undercategories' => $this->id_product_undercategories,
                'id_product_categories' => $this->id_product_categories,
            ]);

            $query->andFilterWhere(['like', 'name_product_undercategories', $this->name_product_undercategories])
                ->andFilterWhere(['like', 'imglink', $this->imglink])
                ->orderBy(['id_product_undercategories' => SORT_DESC]);

            return $dataProvider;
        }
    }
?>