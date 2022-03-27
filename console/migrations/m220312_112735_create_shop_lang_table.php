<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_lang}}`.
 */
class m220312_112735_create_shop_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shop_lang}}', [
            'id' => $this->primaryKey(),
            'language'=>$this->string(),
            'owner_id'=>$this->integer(),
            'name'=>$this->string(),
            'shipping'=>$this->string(),
            'content'=>$this->text(),
        ]);
        $this->addForeignKey('fk_shop_lang','{{%shop_lang}}','owner_id','{{%shop}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_shop_lang','{{%shop_lang}}');
        $this->dropTable('{{%shop_lang}}');
    }
}
