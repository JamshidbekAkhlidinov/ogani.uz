<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "coments".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $owner_id
 * @property string|null $phone
 * @property string|null $name
 * @property string|null $text
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Coments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coments';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['category_id', 'owner_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['text','name','phone'], 'required'],
            [['phone', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'owner_id' => Yii::t('app', 'Owner ID'),
            'phone' => Yii::t('app', 'Phone'),
            'name' => Yii::t('app', 'Name'),
            'text' => Yii::t('app', 'Text'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getBlogs(){
        return $this->hasOne(Blog::class,['id'=>'owner_id']);
    }

}
