<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\QueryBuilder;

/**
 * This is the model class for table "tblUsuario".
 *
 * @property int $idUsuario
 * @property string|null $nomeUsuario
 * @property string|null $emailUsuario
 * @property string|null $senhaUsuario
 * @property string|null $authkeyUSuario
 * @property string|null $accesstokenUsuario
 * @property bool $admUsuario
 */
class TblUsuario extends \yii\db\ActiveRecord implements IdentityInterface 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblUsuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admUsuario'], 'boolean'],
            [['nomeUsuario', 'emailUsuario'], 'string', 'max' => 70],
            [['senhaUsuario'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'ID',
            'nomeUsuario' => 'Nome',
            'emailUsuario' => 'Email',
            'senhaUsuario' => 'Senha',
            'authkeyUsuario' => 'AuthKey',
            'accesstokenUsuario' => 'AccessToken',
            'admUsuario' => 'Administrador',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if($this->isNewRecord) {
                $this->authkeyUsuario = \Yii::$app->security->generateRandomString();
                $this->accesstokenUsuario = \Yii::$app->security->generateRandomString();
                $this->senhaUsuario = $this->senhaUsuario;
            }
            return true;
        }
        return false;
    }
    public static function findIdentity($idUsuario)
    {
        return static::findOne($idUsuario);
    }

    public static function findIdentityByAccessToken($accesstokenUsuario, $type = null)
    {
        return static::findOne(['accesstokenUsuario' => $accesstokenUsuario]);
    }

    public function getId()
    {
        return $this->idUsuario;
    }

    public function getAuthKey()
    {
        return $this->authkeyUsuario;
    }

    public function validateAuthKey($authkeyUsuario)
    {
        return $this->authkeyUsuario === $authkeyUsuario;
    }

    public static function findByUsername($emailUsuario)
    {
       return static::findOne(['emailUsuario' => $emailUsuario]);
    }

    public function RandomPassword()
    {
        $randomPassword = (new \Yii\db\Query())->select("senha_aleatoria");
        return $this->senhaUsuario = $randomPassword;
    }
    
    public function validatePassword($senhaUsuario)
    {
        return $this->senhaUsuario === $senhaUsuario;
    }

    public function getAdmUsuario()
    {
        return $this->admUsuario;
    }
}
