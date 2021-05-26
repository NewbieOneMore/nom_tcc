<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblhistoricoestoque".
 *
 * @property int $idHistEstoque
 * @property int $idProduto
 * @property string $histQtd
 * @property bool $natOperacao
 *
 * @property Tblproduto $idProduto0
 */
class TblHistoricoEstoque extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblhistoricoestoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProduto', 'histQtd'], 'required'],
            [['idProduto'], 'integer'],
            [['histQtd'], 'safe'],
            [['natOperacao'], 'boolean'],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Tblproduto::className(), 'targetAttribute' => ['idProduto' => 'idProduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHistEstoque' => 'Id Hist Estoque',
            'idProduto' => 'Id Produto',
            'histQtd' => 'Hist Qtd',
            'natOperacao' => 'Nat Operacao',
        ];
    }

    /**
     * Gets query for [[IdProduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduto0()
    {
        return $this->hasOne(Tblproduto::className(), ['idProduto' => 'idProduto']);
    }
}
