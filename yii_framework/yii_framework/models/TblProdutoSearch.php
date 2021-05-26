<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblProduto;

/**
 * TblProdutoSearch represents the model behind the search form of `app\models\TblProduto`.
 */
class TblProdutoSearch extends TblProduto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProduto', 'estqProduto', 'idCategoria'], 'integer'],
            [['nomeProduto', 'valProduto'], 'safe'],
            [['precoProduto'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TblProduto::find();

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
            'idProduto' => $this->idProduto,
            'precoProduto' => $this->precoProduto,
            'valProduto' => $this->valProduto,
            'estqProduto' => $this->estqProduto,
            'idCategoria' => $this->idCategoria,
        ]);

        $query->andFilterWhere(['like', 'nomeProduto', $this->nomeProduto]);

        return $dataProvider;
    }
}
