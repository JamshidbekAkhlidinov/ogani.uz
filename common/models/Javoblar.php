<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "javoblar".
 *
 * @property int $id
 * @property int|null $coments_id
 * @property string|null $text
 *
 * @property Coment $coments
 */
class Javoblar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'javoblar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coments_id'], 'integer'],
            [['text'], 'string'],
            [['coments_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coments::className(), 'targetAttribute' => ['coments_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'coments_id' => Yii::t('app', 'Coments ID'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * Gets query for [[Coments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComents()
    {
        return $this->hasOne(Coments::className(), ['id' => 'coments_id']);
    }
}
