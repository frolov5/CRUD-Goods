<?php

use yii\db\Migration;

/**
 * Handles adding position to table `{{%goods}}`.
 */
class m190418_132057_add_position_column_to_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%goods}}', 'image', $this->text()->comment('Изображение'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%goods}}', 'image');
    }
}
