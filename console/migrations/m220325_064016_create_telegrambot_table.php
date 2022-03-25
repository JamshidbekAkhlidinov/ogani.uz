<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegrambot}}`.
 */
class m220325_064016_create_telegrambot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bot_users}}', [
            'id' => $this->primaryKey(),

            'user_chat_id'=>$this->integer(),
            'full_name'=>$this->string(),
            'phone'=>$this->string(),
            'address'=>$this->string(),
            'steep'=>$this->integer(),

            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);

        $this->createTable('{{%bot_murojatlar}}', [
            'id' => $this->primaryKey(),

            'user_id'=>$this->integer(),
            'message'=>$this->string(),

            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);

        $this->addForeignKey('fk_murojatlar_table','{{%bot_murojatlar}}','user_id','{{%bot_users}}','id','cascade','cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_murojatlar_table','{{%bot_murojatlar}}');
        $this->dropTable('{{%bot_murojatlar}}');
        $this->dropTable('{{%bot_users}}');
    }
}
