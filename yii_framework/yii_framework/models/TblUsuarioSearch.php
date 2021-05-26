<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblUsuario;

/**
 * TblUsuarioSearch represents the model behind the search form of `app\models\TblUsuario`.
 */
class TblUsuarioSearch extends TblUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUsuario'], 'integer'],
            [['nomeUsuario', 'emailUsuario', 'senhaUsuario', 'authkeyUsuario', 'accesstokenUsuario'], 'safe'],
            [['admUsuario'], 'boolean'],
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
        $query = TblUsuario::find();

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
            'idUsuario' => $this->idUsuario,
            'admUsuario' => $this->admUsuario,
        ]);

        $query->andFilterWhere(['like', 'nomeUsuario', $this->nomeUsuario])
            ->andFilterWhere(['like', 'emailUsuario', $this->emailUsuario])
            ->andFilterWhere(['like', 'senhaUsuario', $this->senhaUsuario])
            ->andFilterWhere(['like', 'authkeyUsuario', $this->authkeyUsuario])
            ->andFilterWhere(['like', 'accesstokenUsuario', $this->accesstokenUsuario]);

        return $dataProvider;
    }
}
