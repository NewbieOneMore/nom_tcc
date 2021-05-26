<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblPedido".
 *
 * @property int $idPedido
 * @property int $idUsuario
 * @property string $dataPedido
 * @property float $precoPedido
 * @property bool $pagPedido
 */
class TblPedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblPedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUsuario', 'dataPedido', 'precoPedido'], 'required'],
            [['idUsuario'], 'integer'],
            [['dataPedido'], 'safe'],
            [['precoPedido'], 'number'],
            [['pagPedido'], 'boolean'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
    */ 
    public function getUsuario()
    {
        return $this->hasOne(Tblusuario::classname(), ['idUsuario' => 'idUsuario']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
    */
    public function getProduto()
    {
        return $this->hasMany(Tblpedido::classname(), ['idUsuario' => 'idUsuario']);
    }
}
