<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
class TblProduto extends \yii\db\ActiveRecord 
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
            'idProduto' => 'ID',
            'nomeProduto' => 'Produto',
            'precoProduto' => 'Preço',
            'valProduto' => 'Validade',
            'estqProduto' => 'Quantidade',
            'idCategoria' => 'Categoria',
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
}