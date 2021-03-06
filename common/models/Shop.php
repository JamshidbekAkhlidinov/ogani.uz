<?php

namespace common\models;

use Yii;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Shop extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'shop';
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
                        'name', 'shipping','content',
                    ]
                ],
                TimestampBehavior::class,
                BlameableBehavior::class,
            ];
        }

    const CREATE = 'create';
    const UPDATE = 'update';

    public function rules()
    {
        return [
            [['category_id', 'status','weight', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['img','name', 'shipping'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopCategory::className(), 'targetAttribute' => ['category_id' => 'id']],

            [['img','category_id','status','price', 'price_new','name', 'shipping','weight','content','sale'], 'required','on'=>self::CREATE],

            [['category_id','status','price', 'price_new','name', 'shipping','weight','content','sale'], 'required','on'=>self::UPDATE],
            
            ['content','string'],
            [['price', 'price_new','sale'],'integer'],
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
            'img' => Yii::t('app', 'Img'),
            'category_id' => Yii::t('app', 'Category nomi'),
            'price' => Yii::t('app', 'Eski narxi'),
            'price_new' => Yii::t('app', 'Yangi narxi'),
            'status' => Yii::t('app', 'Status'),
            'shipping' => Yii::t('app', 'Yetkazib berish'),
            'sale' => Yii::t('app', 'Skidkasi % da'),
            'weight' => Yii::t('app', 'Og\'irligi'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ShopCategory::className(), ['id' => 'category_id']);
    }

    public function getImgs(){
        return $this->hasMany(ProductsImgs::className(),['products_id'=>'id']);
    }

    
    public function getCreatedBy(){
        return $this->hasOne(User::className(),['id'=>'created_by']);
    }

    public function getUpdatedBy(){
        return $this->hasOne(User::className(),['id'=>'updated_by']);
    }

    /**
     * Gets query for [[ShopLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getShopLangs()
    // {
    //     return $this->hasMany(ShopLang::className(), ['owner_id' => 'id']);
    // }
}
