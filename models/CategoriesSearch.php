<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categories;

class CategoriesSearch extends Categories
{
    public function rules()
    {
        return [
            [['id_product_categories'], 'integer'],
            [['name_product_categories'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Categories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->pagination->pageSize = 10;

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_product_categories' => $this->id_product_categories,
        ]);

        $query->andFilterWhere(['like', 'name_product_categories', $this->name_product_categories])
            ->andFilterWhere(['like', 'imglink', $this->imglink])
            ->orderBy(['id_product_categories' => SORT_DESC]);

        return $dataProvider;
    }
}