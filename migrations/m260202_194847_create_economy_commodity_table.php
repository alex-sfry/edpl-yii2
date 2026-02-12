<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%economy_commodity}}`.
 */
class m260202_194847_create_economy_commodity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%economy_commodity}}', [
            'id' => $this->primaryKey(),
            'commodity_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'economy' => $this->string(50)->notNull()->append('COLLATE NOCASE'),
            'trade_type' => $this->string(50)->notNull()->append('COLLATE NOCASE'),
        ]);
        $this->createIndex(
            'economy_commodity_commodity_economy_trade_type_idx',
            'economy_commodity',
            ['commodity_id', 'economy', 'trade_type'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%economy_commodity}}');
    }
}
