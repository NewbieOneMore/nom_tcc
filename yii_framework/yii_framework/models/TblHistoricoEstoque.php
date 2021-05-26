<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblHistoricoEstoque".
 *
 * @property int $idHistEstoque
 * @property int $idPedidoProduto
 * @property int $idProduto
 * @property string $histQtd
 * @property bool $natOperacao
 */
class TblHistoricoEstoque extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblHistoricoEstoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPedidoProduto', 'idProduto', 'histQtd'], 'required'],
            [['idPedidoProduto', 'idProduto'], 'integer'],
            [['histQtd'], 'safe'],
            [['natOperacao'], 'boolean'],
            [['idPedidoProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Tblpedidoproduto::className(), 'targetAttribute' => ['idPedidoProduto' => 'idPedidoProduto']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Tblproduto::className(), 'targetAttribute' => ['idProduto' => 'idProduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHistEstoque' => 'ID',
            'idPedidoProduto' => 'ID Pedido Produto',
            'idProduto' => 'ID Produto',
            'histQtd' => 'Histórico Quantidade',
            'natOperacao' => 'Natureza da Operação',
        ];
    }
}
