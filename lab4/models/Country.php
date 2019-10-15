<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $id_type_country
 * @property string $datatime
 *
 * @property TypeCountry $typeCountry
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'id_type_country', 'datatime'], 'required'],
            [['name', 'url', 'datatime'], 'string'],
            [['id_type_country'], 'integer'],
            [['id_type_country'], 'exist', 'skipOnError' => true, 'targetClass' => TypeCountry::className(), 'targetAttribute' => ['id_type_country' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'id_type_country' => 'Id Type Country',
            'datatime' => 'Datatime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeCountry()
    {
        return $this->hasOne(TypeCountry::className(), ['id' => 'id_type_country']);
    }
}
