<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_column_shop_drop_shop_lang}}`.
 */
class m220313_035649_create_add_column_shop_drop_shop_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('{{%shop}}','sale',$this->string());
       $this->dropColumn('{{%shop_lang}}','sale');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('{{%shop}}','sale');
        }
}
