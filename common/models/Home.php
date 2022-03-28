<?php

namespace common\models;

use Yii;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;


class Home extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'home';
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
                    'text', 'title','subtitle','btn_name',
                ]
            ],
        ];
    }

    
    const CREATED = 'created';
    const UPDATED = 'updated';

    public function rules()
    {
        return [
            [['img', 'imgrek1', 'imgrek2'], 'string', 'max' => 255],
            [['img', 'imgrek1', 'imgrek2'], 'file', 'extensions' => 'jpg,png,bmp,jpeg'],
            [['text', 'title','subtitle','btn_name','img', 'imgrek1', 'imgrek2'],'required','on'=>self::CREATED],
            [['text', 'title','subtitle','btn_name'],'required','on'=>self::UPDATED],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Img'),
            'imgrek1' => Yii::t('app', 'Imgrek 1'),
            'imgrek2' => Yii::t('app', 'Imgrek 2'),
        ];
    }
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
}
