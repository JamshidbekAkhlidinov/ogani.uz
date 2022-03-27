<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%people}}`.
 */
class m220314_085356_create_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%people}}', [
            'id' => $this->primaryKey(),
            'first_name'=>$this->string(),
            'last_name'=>$this->string(),
            'email'=>$this->string(),
            'address'=>$this->string(),
            'phone'=>$this->string(),
            'status'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%people}}');
    }
}
