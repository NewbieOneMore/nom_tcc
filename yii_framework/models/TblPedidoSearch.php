<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPedido;



/**
 * TblPedidoSearch represents the model behind the search form of `app\models\TblPedido`.
 */
class TblPedidoSearch extends TblPedido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPedido', 'idPagamento'], 'integer'],
            [['dataPedido', 'idUsuario'], 'safe'],
            [['precoPedido'], 'number'],
            [['pagPedido'], 'boolean'],
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
        $query = TblPedido::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('usuario');

        // grid filtering conditions
        $query->andFilterWhere([
            'idPedido' => $this->idPedido,
            'dataPedido' => $this->dataPedido,
            'precoPedido' => $this->precoPedido,
            'pagPedido' => $this->pagPedido,
            'idPagamento' => $this->idPagamento,
        ]);
        
        $query->andFilterWhere(['like', 'nomeUsuario', $this->idUsuario]);

        return $dataProvider;
    }
}
