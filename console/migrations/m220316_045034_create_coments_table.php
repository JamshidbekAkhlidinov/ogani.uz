<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coments}}`.
 */
class m220316_045034_create_coments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coments}}', [
            'id' => $this->primaryKey(),
            'category_id'=>$this->integer(),
            'owner_id'=>$this->integer(),
            'phone'=>$this->string(),
            'name'=>$this->string(),
            'text'=>$this->text(),
            'status'=>$this->integer()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%coments}}');
    }
}
