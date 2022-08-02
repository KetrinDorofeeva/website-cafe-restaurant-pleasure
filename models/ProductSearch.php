<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

class ProductSearch extends Product
{
    public function rules()
    {
        return [
            [['id', 'price'], 'integer'],
            [['title', 'description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->pagination->pageSize = 10;

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_product_categories' => $this->id_product_categories,
            'id_product_undercategories' => $this->id_product_undercategories,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'imglink', $this->imglink])
            ->andFilterWhere(['like', 'description', $this->description])
            ->orderBy(['id' => SORT_DESC]);

        return $dataProvider;
    }
}