<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%distances}}`.
 */
class m260203_015316_create_distances_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%distances}}', [
            'id' => $this->primaryKey(),
            'system_1_id' => $this->integer()->notNull(),
            'system_2_id' => $this->integer()->notNull(),
            'distance' => $this->float()->notNull(),
        ]);
        $this->createIndex('distances_system_1_id_system_2_id_idx', 'distances', ['system_1_id', 'system_2_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%distances}}');
    }
}
