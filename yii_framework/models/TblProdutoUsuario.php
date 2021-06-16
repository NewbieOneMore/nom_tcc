<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

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
class TblProdutoUsuario extends \yii\db\ActiveRecord implements CartPositionInterface
{
    /**
     * {@inheritdoc}
     */

    use CartPositionTrait;

    public function getPrice()
    {
        return $this->precoProduto;
    }

    public function getId()
    {
        return $this->idProduto;
    }

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

    /**
     * @return \yii\db\ActiveQuery
    */ 
    public function getCategoria()
    {
        return $this->hasOne(Tblcategoria::classname(), ['idCategoria' => 'idCategoria']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
    */
    public function getProduto()
    {
        return $this->hasMany(TblProduto::classname(), ['idCategoria' => 'idCategoria']);
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
}
