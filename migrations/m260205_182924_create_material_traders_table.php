<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%material_traders}}`.
 */
class m260205_182924_create_material_traders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%material_traders}}', [
            'id' => $this->primaryKey(),
            'material_type' => $this->string(50),
            'system_id' => $this->integer()->notNull(),
            'station_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%material_traders}}');
    }
}
