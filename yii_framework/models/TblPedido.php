<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblpedido".
 *
 * @property int $idPedido
 * @property int $idUsuario
 * @property string $dataPedido
 * @property float $precoPedido
 * @property bool $pagPedido
 * @property int $idPagamento
 *
 * @property Tblpagamento $idPagamento0
 * @property Tblusuario $idUsuario0
 * @property Tblpedidoproduto[] $tblpedidoprodutos
 */
class TblPedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblpedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUsuario', 'dataPedido', 'precoPedido', 'idPagamento'], 'required'],
            [['idUsuario', 'idPagamento'], 'integer'],
            [['dataPedido'], 'safe'],
            [['precoPedido'], 'number'],
            [['pagPedido'], 'boolean'],
            [['idPagamento'], 'exist', 'skipOnError' => true, 'targetClass' => Tblpagamento::className(), 'targetAttribute' => ['idPagamento' => 'idPagamento']],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Tblusuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPedido' => 'ID',
            'idUsuario' => 'Usuario',
            'dataPedido' => 'Data',
            'precoPedido' => 'Preço',
            'pagPedido' => 'Pago',
            'idPagamento' => 'Pagamento',
        ];
    }

    /**
     * Gets query for [[IdPagamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagamento()
    {
        return $this->hasOne(Tblpagamento::className(), ['idPagamento' => 'idPagamento']);
    }

    /**
     * Gets query for [[IdUsuario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Tblusuario::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * Gets query for [[Tblpedidoprodutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblpedidoprodutos()
    {
        return $this->hasMany(Tblpedidoproduto::className(), ['idPedido' => 'idPedido']);
    }
}
