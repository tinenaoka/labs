<?php

namespace app\models;

use Yii;
use app\models\Items;
use app\models\OrderItems;

/**
 * This is the model class for table "order".
 *
 * @property int $id_order
 * @property string $date
 * @property string $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'status'], 'required'],
            [['date'], 'safe'],
            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['id_order' => 'id_order']);
    }

    public function getItems()
    {
        return $this->hasMany(Items::className(), ['id_item' => 'id_item'])
            ->via('order_items');
    }
}
