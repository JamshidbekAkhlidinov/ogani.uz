<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%xabarlar}}`.
 */
class m220328_083646_create_xabarlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%xabarlar}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'phone'=>$this->string(),
            'text'=>$this->text(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%xabarlar}}');
    }
}
