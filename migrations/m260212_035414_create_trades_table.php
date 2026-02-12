<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trades}}`.
 */
class m260212_035414_create_trades_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trades}}', [
            'id' => $this->primaryKey(),
            'commodity_id' => $this->integer()->notNull(),
            'buy_station_id' => $this->integer()->notNull(),
            'buy_price' => $this->integer()->notNull(),
            'sell_station_id' => $this->integer()->notNull(),
            'sell_price' => $this->integer()->notNull(),
            'created_at' =>  $this->integer()->notNull(),
            'updated_at' =>  $this->integer()->notNull(),
        ]);
        $this->createIndex('trades_commodity_id_idx', 'trades', ['commodity_id']);
        $this->createIndex('trades_buy_station_id_idx', 'trades', ['buy_station_id']);
        $this->createIndex('trades_sell_station_id_idx', 'trades', ['sell_station_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trades}}');
    }
}
