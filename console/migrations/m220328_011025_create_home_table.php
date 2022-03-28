<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%home}}`.
 */
class m220328_011025_create_home_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%home}}', [
            'id' => $this->primaryKey(),
            'img'=>$this->string(),
            'imgrek1'=>$this->string(),
            'imgrek2'=>$this->string(),
        ]);
        $this->createTable('{{%home_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id'=>$this->integer(),
            'language'=>$this->string(),
            'text'=>$this->string(),
            'title'=>$this->string(),
            'subtitle'=>$this->string(),
            'btn_name'=>$this->string(),
        ]);
        $this->addForeignKey('fk_home_table_connect_lang','{{%home_lang}}','owner_id','{{%home}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_home_table_connect_lang','{{%home_lang}}');
        $this->dropTable('{{%home_lang}}');
        $this->dropTable('{{%home}}');
    }
}
