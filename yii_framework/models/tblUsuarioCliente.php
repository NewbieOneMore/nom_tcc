<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblusuario".
 *
 * @property int $idUsuario
 * @property string $nomeUsuario
 * @property string $emailUsuario
 * @property string $senhaUsuario
 * @property string $authkeyUsuario
 * @property string $accesstokenUsuario
 * @property bool $admUsuario
 *
 * @property Tblpedido[] $tblpedidos
 */
class tblUsuarioCliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblusuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeUsuario', 'emailUsuario', 'senhaUsuario', 'authkeyUsuario', 'accesstokenUsuario'], 'required'],
            [['admUsuario'], 'boolean'],
            [['nomeUsuario', 'emailUsuario'], 'string', 'max' => 70],
            [['senhaUsuario'], 'string', 'max' => 30],
            [['authkeyUsuario', 'accesstokenUsuario'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nomeUsuario' => 'Nome Usuario',
            'emailUsuario' => 'Email Usuario',
            'senhaUsuario' => 'Senha Usuario',
            'authkeyUsuario' => 'Authkey Usuario',
            'accesstokenUsuario' => 'Accesstoken Usuario',
            'admUsuario' => 'Adm Usuario',
        ];
    }

    /**
     * Gets query for [[Tblpedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblpedidos()
    {
        return $this->hasMany(Tblpedido::className(), ['idUsuario' => 'idUsuario']);
    }
}
