<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;


class Contactus extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'contactus';
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
                    'support_time', 'address','open_time',
                ]
            ],
        ];
    }

    const CREATED = 'created';
    const UPDATED = 'updated';

    public function rules()
    {
        return [
            [['phone', 'email','support_time', 'address','open_time'], 'string', 'max' => 255],
            [['logo', 'phone', 'email', 'location','support_time', 'address','open_time'], 'required','on'=>self::CREATED],
            [['phone', 'email', 'location','support_time', 'address','open_time'], 'required','on'=>self::UPDATED],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logo' => Yii::t('app', 'Logo'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'location' => Yii::t('app', 'Location'),
        ];
    }
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
    
}
