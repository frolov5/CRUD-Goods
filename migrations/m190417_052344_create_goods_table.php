<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods}}`.
 */
class m190417_052344_create_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goods}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->unique()->notNull()->comment('Заголовок товара'),
            'price' => $this->float()->comment('Цена товара'),
            'description' => $this->text()->comment('Описание товара'),
            'category_id' => $this->integer()->defaultValue(1)->comment('Идентификатор категории'),
            'status' => $this->string()->notNull()->comment('Статус товара'),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods}}');
    }
}
