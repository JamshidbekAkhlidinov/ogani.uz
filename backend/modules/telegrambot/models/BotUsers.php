<?php

namespace backend\modules\telegrambot\models;

use Yii;

/**
 * This is the model class for table "bot_users".
 *
 * @property int $id
 * @property int|null $user_chat_id
 * @property string|null $full_name
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $steep
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property BotMurojatlar[] $botMurojatlars
 */
class BotUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_chat_id', 'steep', 'created_at', 'updated_at'], 'integer'],
            [['full_name', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_chat_id' => Yii::t('app', 'User Chat ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'steep' => Yii::t('app', 'Steep'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[BotMurojatlars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBotMurojatlars()
    {
        return $this->hasMany(BotMurojatlar::className(), ['user_id' => 'id']);
    }
}
