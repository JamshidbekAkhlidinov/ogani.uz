<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class Blog extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;


    public static function tableName()
    {
        return 'blog';
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
                    'title','content',
                ]
            ],
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }


    const CREATED = 'created';
    const UPDATED = 'updated';


    public function rules()
    {
        return [
            [['category_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['img','title'], 'string', 'max' => 255],
            ['content','string'],
            [['img','title','content','category_id', 'status'], 'required','on'=>self::CREATED],
            [['title','content','category_id', 'status'], 'required','on'=>self::UPDATED],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

  


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Img'),
            'category_id' => Yii::t('app', 'Category ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[BlogLangs]].
     *
     * @return \yii\db\ActiveQuery
     */

    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
    
   
    public function getCategory()
    {
        return $this->hasOne(BlogCategory::className(), ['id' => 'category_id']);
    }

    
    public function getCommentsCount(){
        return $this->hasMany(Coments::class,['owner_id'=>'id'])->count();
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
