<?php

namespace common\models;

use Yii;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class ShopCategory extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'shop_category';
    }

     public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'ru' => 'Ruscha',
                    'uz' => 'Uzbek',
                ],
                'attributes' => [
                    'category_name',
                ]
            ],
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }

    const CEREATED = 'created';
    const UPDATED = 'updated';
    public function rules()
    {
        return [
            ['category_name','string'],
            [['img','category_name','status'],'required','on'=>self::CEREATED],
            [['category_name','status'],'required','on'=>self::UPDATED],
            
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[ShopCategoryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getShopCategoryLangs()
    // {
    //     return $this->hasMany(ShopCategoryLang::className(), ['owner_id' => 'id']);
    // }

    /**
     * Gets query for [[Shops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shop::className(), ['category_id' => 'id']);
    }

    public function getShopscount()
    {
        return $this->hasMany(Shop::className(), ['category_id' => 'id'])->count();
    }


    public function getCreatedBy(){
        return $this->hasOne(User::className(),['id'=>'created_by']);
    }

    public function getUpdatedBy(){
        return $this->hasOne(User::className(),['id'=>'updated_by']);
    }

}
