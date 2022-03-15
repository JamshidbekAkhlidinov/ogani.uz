<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_column_people_status}}`.
 */
class m220315_044929_create_add_column_people_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('{{%people}}','status',$this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('{{%people}}','status');
    }
}
