<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop}}`.
 */
class m220312_112705_create_shop_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shop}}', [
            'id' => $this->primaryKey(),
            'img'=>$this->string(),
            'category_id'=>$this->integer(),
            'price'=>$this->string(),
            'price_new'=>$this->string(),
            'status'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->addForeignKey('fk_shop_ca_table','{{%shop}}','category_id','{{%shop_category}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_shop_ca_table','{{%shop}}');
        $this->dropTable('{{%shop}}');
    }
}
