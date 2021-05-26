<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblPedidoProduto".
 *
 * @property int $idPedidoProduto
 * @property int $idPedido
 * @property int $idProduto
 * @property int $qtdProduto
 * @property float $valorProduto
 * @property bool $retProduto
 */
class TblPedidoProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblPedidoProduto';
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
            'idPedido' => 'Id Pedido',
            'idProduto' => 'Id Produto',
            'qtdProduto' => 'Qtd Produto',
            'valorProduto' => 'Valor Produto',
            'retProduto' => 'Ret Produto',
        ];
    }
}
