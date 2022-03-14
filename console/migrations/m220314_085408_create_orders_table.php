<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m220314_085408_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'order_id'=>$this->integer(),
            'product_id'=>$this->integer(),
            'product_name'=>$this->string(),
            'product_price'=>$this->float(),
            'product_count'=>$this->integer(),
            'product_sum'=>$this->float(),
        ]);
        $this->addForeignKey('fk_people_orders_table','{{%orders}}','order_id','{{%people}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_people_orders_table','{{%orders}}');
        $this->dropTable('{{%orders}}');
    }
}
