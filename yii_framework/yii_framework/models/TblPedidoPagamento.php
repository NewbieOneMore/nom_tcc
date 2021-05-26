<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblPedidoPagamento".
 *
 * @property int $idPedidoPagamento
 * @property int $idPedido
 * @property int $idPagamento
 * @property float $valorPago
 */
class TblPedidoPagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblPedidoPagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPedido', 'idPagamento', 'valorPago'], 'required'],
            [['idPedido', 'idPagamento'], 'integer'],
            [['valorPago'], 'number'],
            [['idPedido'], 'exist', 'skipOnError' => true, 'targetClass' => Tblpedido::className(), 'targetAttribute' => ['idPedido' => 'idPedido']],
            [['idPagamento'], 'exist', 'skipOnError' => true, 'targetClass' => Tblpagamento::className(), 'targetAttribute' => ['idPagamento' => 'idPagamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPedidoPagamento' => 'Id Pedido Pagamento',
            'idPedido' => 'Id Pedido',
            'idPagamento' => 'Id Pagamento',
            'valorPago' => 'Valor Pago',
        ];
    }
}
