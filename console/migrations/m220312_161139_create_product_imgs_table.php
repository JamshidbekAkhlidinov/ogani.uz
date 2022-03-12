<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%imgs}}`.
 */
class m220312_161139_create_product_imgs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%imgs}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'product_id'=>$this->integer(),
        ]);
        $this->addForeignKey('fk_imgs_products_photo','{{%imgs}}','product_id','{{%shop}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_imgs_products_photo','{{%imgs}}');
        $this->dropTable('{{%imgs}}');
    }
}
