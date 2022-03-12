<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_imgs}}`.
 */
class m220312_162252_create_products_imgs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_imgs}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'products_id'=>$this->integer(),
        ]);
        $this->addForeignKey('fk_product_imgs','{{%products_imgs}}','products_id','{{%shop}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_imgs','{{%products_imgs}}');
        $this->dropTable('{{%products_imgs}}');
    }
}
