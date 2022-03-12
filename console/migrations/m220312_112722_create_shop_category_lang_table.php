<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_category_lang}}`.
 */
class m220312_112722_create_shop_category_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shop_category_lang}}', [
            'id' => $this->primaryKey(),
            'language'=>$this->string(),
            'owner_id'=>$this->integer(),
            'category_name'=>$this->string(),
        ]);
        $this->addForeignKey('fk_shop_category_lang','{{%shop_category_lang}}','owner_id','{{%shop_category}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_shop_category_lang','{{%shop_category_lang}}');
        $this->dropTable('{{%shop_category_lang}}');
    }
}
