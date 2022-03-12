<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_imgs".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $products_id
 *
 * @property Shop $products
 */
class ProductsImgs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_imgs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['products_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['products_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'products_id' => Yii::t('app', 'Products ID'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Shop::className(), ['id' => 'products_id']);
    }
}
