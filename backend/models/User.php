<?php

namespace backend\models;

use common\models\Blog;
use common\models\BlogCategory;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string|null $name
 * @property string|null $img
 *
 * @property BlogCategory[] $blogCategories
 * @property BlogCategory[] $blogCategories0
 * @property Blog[] $blogs
 * @property Blog[] $blogs0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
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
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['password_hash', 'password_reset_token', 'email', 'verification_token', 'name', 'img'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['username','name'],'string','max'=>100,'min'=>5],
            ['email','email'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'name' => Yii::t('app', 'Name'),
            'img' => Yii::t('app', 'Img'),
        ];
    }

    /**
     * Gets query for [[BlogCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategories()
    {
        return $this->hasMany(BlogCategory::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[BlogCategories0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategories0()
    {
        return $this->hasMany(BlogCategory::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[Blogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Blogs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs0()
    {
        return $this->hasMany(Blog::className(), ['updated_by' => 'id']);
    }
}
