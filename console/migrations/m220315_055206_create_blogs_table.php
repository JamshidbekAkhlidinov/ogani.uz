<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blogs}}`.
 */
class m220315_055206_create_blogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog_category}}', [
            'id' => $this->primaryKey(),
            'status'=>$this->integer(),
            'img'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%blog_category_lang}}', [
            'id' => $this->primaryKey(),
            'language'=>$this->string(),
            'owner_id'=>$this->integer(),
            'category_name'=>$this->string(),
        ]);

        $this->addForeignKey('fk_blog_cate_lang_tbale','{{%blog_category_lang}}','owner_id','{{%blog_category}}','id','cascade','cascade');


        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'img'=>$this->string(),
            'category_id'=>$this->integer(),
            'status'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%blog_lang}}', [
            'id' => $this->primaryKey(),
            'language'=>$this->string(6),
            'owner_id'=>$this->integer(),
            'title'=>$this->string(),
            'content'=>$this->text(),
        ]);

        $this->addForeignKey('fk_blogs_category_table','{{%blog}}','category_id','{{%blog_category}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_blogs_blog_lang','{{%blog_lang}}','owner_id','{{%blog}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_user_id_category1','{{%blog_category}}','created_by','{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_user_id_category2','{{%blog_category}}','updated_by','{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_user_id_BLOGS1','{{%blog}}','created_by','{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_user_id_BLOGS2','{{%blog}}','updated_by','{{%user}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_blog_cate_lang_tbale','{{%blog_category_lang}}');

        $this->dropForeignKey('fk_blogs_category_table','{{%blog}}');
        $this->dropForeignKey('fk_blogs_blog_lang','{{%blog_lang}}');
        $this->dropForeignKey('fk_user_id_category1','{{%blog_category}}');
        $this->dropForeignKey('fk_user_id_BLOGS1','{{%blog}}');        


        $this->dropTable('{{%blog_category}}');
        $this->dropTable('{{%blog_category_lang}}');
        $this->dropTable('{{%blog}}');
        $this->dropTable('{{%blog_lang}}');
    }
}
