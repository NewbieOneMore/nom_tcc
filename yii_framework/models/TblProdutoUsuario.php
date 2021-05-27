<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblProduto".
 *
 * @property int $idProduto
 * @property string $nomeProduto
 * @property float $precoProduto
 * @property string $valProduto
 * @property int $estqProduto
 * @property int $idCategoria
 */
class TblProdutoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblProduto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeProduto', 'precoProduto', 'valProduto', 'estqProduto', 'idCategoria'], 'required'],
            [['precoProduto'], 'number'],
            [['valProduto'], 'safe'],
            [['estqProduto', 'idCategoria'], 'integer'],
            [['nomeProduto'], 'string', 'max' => 70],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Tblcategoria::className(), 'targetAttribute' => ['idCategoria' => 'idCategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProduto' => 'Id Produto',
            'nomeProduto' => 'Produto',
            'precoProduto' => 'Preço',
            'valProduto' => 'Validade',
            'estqProduto' => 'Estoque',
            'idCategoria' => 'Id Categoria',
        ];
    }
}