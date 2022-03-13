<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_add_column}}`.
 */
class m220313_093734_create_shop_add_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%shop}}','weight',$this->string());
        $this->dropColumn('{{%shop_lang}}','weight');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%shop}}','weight');
    }
}
