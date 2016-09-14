<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike".
 *
 * @property integer $id
 * @property string $fabricante
 * @property string $modelo
 * @property string $cor
 * @property string $marchar
 * @property string $marchadocambio
 * @property string $proprietario
 * @property string $celular
 * @property string $email
 */
class Bike extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bike';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabricante', 'modelo', 'cor', 'proprietario', 'celular'], 'required'],
            [['marchar'], 'string'],
            [['fabricante', 'proprietario', 'email'], 'string', 'max' => 50],
            [['modelo', 'cor', 'marchadocambio'], 'string', 'max' => 25],
            [['celular'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fabricante' => 'Fabricante',
            'modelo' => 'Modelo',
            'cor' => 'Cor',
            'marchar' => 'Marcha',
            'marchadocambio' => 'Marca do Cambio',
            'proprietario' => 'Proprietario',
            'celular' => 'Celular',
            'email' => 'Email',
        ];
    }
}
