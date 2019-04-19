<?php

namespace app\models\search;

use yii\data\ActiveDataProvider;
use app\models\Good;

class GoodSearch extends Good
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id','title','price', 'description', 'category_id', 'status'], 'safe'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()){
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like','title',$this->title]);
        $query->andFilterWhere(['like','price',$this->price]);
        $query->andFilterWhere(['like','description',$this->description]);
        $query->andFilterWhere(['like','category_id',$this->category_id]);
        $query->andFilterWhere(['like','status',$this->status]);

        return $dataProvider;
    }
}