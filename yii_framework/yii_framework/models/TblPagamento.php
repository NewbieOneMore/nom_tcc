<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblPagamento".
 *
 * @property int $idPagamento
 * @property string $formaPagamento
 */
class TblPagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblPagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['formaPagamento'], 'required'],
            [['formaPagamento'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPagamento' => 'ID',
            'formaPagamento' => 'Forma Pagamento',
        ];
    }
}
