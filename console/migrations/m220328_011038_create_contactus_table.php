<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contactus}}`.
 */
class m220328_011038_create_contactus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contactus}}', [
            'id' => $this->primaryKey(),
            'logo'=>$this->string(),
            'phone'=>$this->string(),
            'email'=>$this->string(),
            'location'=>$this->string(),
        ]);
        $this->createTable('{{%contactus_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id'=>$this->integer(),
            'language'=>$this->string(),
            'support_time'=>$this->string(),
            'address'=>$this->string(),
            'open_time'=>$this->string(),
        ]);
        $this->addForeignKey('fk_contactus_connect_lang_table','{{%contactus_lang}}','owner_id','{{%contactus}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_contactus_connect_lang_table','{{%contactus_lang}}');
        $this->dropTable('{{%contactus_lang}}');
        $this->dropTable('{{%contactus}}');
    }
}
