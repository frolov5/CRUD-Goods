<?php

use yii\db\Migration;

/**
 * Handles dropping position from table `{{%goods}}`.
 */
class m190418_142720_drop_position_column_from_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%goods}}', 'image');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
