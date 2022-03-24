<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%javoblar}}`.
 */
class m220324_113756_create_javoblar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%javoblar}}', [
            'id' => $this->primaryKey(),
            'coments_id'=>$this->integer(),
            'text'=>$this->text(),
        ]);
        $this->addForeignKey('fk_javob_table','{{%javoblar}}','coments_id','{{%coments}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_javob_table','{{%javoblar}}');
        $this->dropTable('{{%javoblar}}');
    }
}
