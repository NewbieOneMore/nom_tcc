<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblCategoria".
 *
 * @property int $idCategoria
 * @property string $nomeCategoria
 */
class TblCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblCategoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeCategoria'], 'required'],
            [['nomeCategoria'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCategoria' => 'ID',
            'nomeCategoria' => 'Categoria',
        ];
    }
}
