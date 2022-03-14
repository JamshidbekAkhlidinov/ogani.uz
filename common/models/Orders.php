<?php

namespace common\models;

use Yii;
use common\models\People;

class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id','product_id', 'product_count'], 'integer'],
            [['product_price', 'product_sum'], 'number'],
            [['product_name'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_price' => Yii::t('app', 'Product Price'),
            'product_count' => Yii::t('app', 'Product Count'),
            'product_sum' => Yii::t('app', 'Product Sum'),
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(People::className(), ['id' => 'order_id']);
    }
}
