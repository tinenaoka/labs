<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id_order_items
 * @property int $id_order
 * @property int $id_item
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_item'], 'required'],
            [['id_order', 'id_item'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order_items' => 'Id Order Items',
            'id_order' => 'Id Order',
            'id_item' => 'Id Item',
        ];
    }
}
