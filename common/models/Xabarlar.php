<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xabarlar".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $text
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Xabarlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'xabarlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 255],
            [['name', 'phone','text'], 'required'],

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
            'phone' => Yii::t('app', 'Phone'),
            'text' => Yii::t('app', 'Text'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
