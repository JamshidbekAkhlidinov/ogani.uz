<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_Add_column}}`.
 */
class m220315_094504_create_user_Add_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('{{%user}}','name',$this->string()->defaultValue("Admin"));
       $this->addColumn('{{%user}}','img',$this->string()->defaultValue('no-img.png'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}','name');
       $this->dropColumn('{{%user}}','img');
    }
}
