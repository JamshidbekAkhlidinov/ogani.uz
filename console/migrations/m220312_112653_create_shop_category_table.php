<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_category}}`.
 */
class m220312_112653_create_shop_category_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('{{%shop_category}}', [
            'id' => $this->primaryKey(),
            'status'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shop_category}}');
    }
}
