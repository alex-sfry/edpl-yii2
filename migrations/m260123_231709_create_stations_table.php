<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stations}}`.
 */
class m260123_231709_create_stations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stations}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'type' => $this->string(50),
            'dta' => $this->integer(),
            'economy' => $this->string(50),
            'government' => $this->string(50),
            'allegiance' => $this->string(50),
            'system_id' => $this->integer()->notNull(),
            'created_at' =>  $this->integer()->notNull(),
            'updated_at' =>  $this->integer()->notNull(),
        ]);
        $this->createIndex('stations_name_idx', 'stations', 'name');
        $this->createIndex('stations_system_id_idx', 'stations', 'system_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stations}}');
    }
}
