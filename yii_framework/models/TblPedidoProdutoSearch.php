<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPedidoProduto;

/**
 * TblPedidoProdutoSearch represents the model behind the search form of `app\models\TblPedidoProduto`.
 */
class TblPedidoProdutoSearch extends TblPedidoProduto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPedidoProduto', 'idPedido', 'idProduto', 'qtdProduto'], 'integer'],
            [['valorProduto'], 'number'],
            [['retProduto'], 'boolean'],
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
        $query = TblPedidoProduto::find();

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
            'idPedidoProduto' => $this->idPedidoProduto,
            'idPedido' => $this->idPedido,
            'idProduto' => $this->idProduto,
            'qtdProduto' => $this->qtdProduto,
            'valorProduto' => $this->valorProduto,
            'retProduto' => $this->retProduto,
        ]);

        return $dataProvider;
    }
}
