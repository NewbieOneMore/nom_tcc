<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblpedidoproduto".
 *
 * @property int $idPedidoProduto
 * @property int $idPedido
 * @property int $idProduto
 * @property int $qtdProduto
 * @property float $valorProduto
 * @property bool $retProduto
 *
 * @property Tblpedido $idPedido0
 * @property Tblproduto $idProduto0
 */
class TblPedidoProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblpedidoproduto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPedido', 'idProduto', 'qtdProduto', 'valorProduto'], 'required'],
            [['idPedido', 'idProduto', 'qtdProduto'], 'integer'],
            [['valorProduto'], 'number'],
            [['retProduto'], 'boolean'],
            [['idPedido'], 'exist', 'skipOnError' => true, 'targetClass' => Tblpedido::className(), 'targetAttribute' => ['idPedido' => 'idPedido']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Tblproduto::className(), 'targetAttribute' => ['idProduto' => 'idProduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPedidoProduto' => 'Id Pedido Produto',
            'idPedido' => 'ID Pedido',
            'idProduto' => 'Produto',
            'qtdProduto' => 'Quantidade',
            'valorProduto' => 'Valor',
            'retProduto' => 'Retirado',
        ];
    }

    /**
     * Gets query for [[IdPedido0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPedido()
    {
        return $this->hasOne(Tblpedido::className(), ['idPedido' => 'idPedido']);
    }

    /**
     * Gets query for [[IdProduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Tblproduto::className(), ['idProduto' => 'idProduto']);
    }
}
