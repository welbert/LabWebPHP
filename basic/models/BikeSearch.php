<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bike;

/**
 * BikeSearch represents the model behind the search form about `app\models\Bike`.
 */
class BikeSearch extends Bike
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            //[['fabricante', 'modelo', 'cor', 'marchar', 'marchadocambio', 'proprietario', 'celular', 'email'], 'safe'],
            [['fabricante', 'modelo', 'cor', 'proprietario', 'celular', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Bike::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'fabricante', $this->fabricante])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'cor', $this->cor])
    //       ->andFilterWhere(['like', 'marchar', $this->marchar])
    //       ->andFilterWhere(['like', 'marchadocambio', $this->marchadocambio])
            ->andFilterWhere(['like', 'proprietario', $this->proprietario])
    //       ->andFilterWhere(['like', 'celular', $this->celular])
    //       ->andFilterWhere(['like', 'email', $this->email]);
        ;

        return $dataProvider;
    }
}
