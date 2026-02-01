<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%systems}}`.
 */
class m260122_181853_create_systems_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%systems}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->append('COLLATE NOCASE'),
            'primary_economy' => $this->string(50)->append('COLLATE NOCASE'),
            'secondary_economy' => $this->string(50)->append('COLLATE NOCASE'),
            'government' => $this->string(50)->append('COLLATE NOCASE'),
            'allegiance' => $this->string(50)->append('COLLATE NOCASE'),
            'security' => $this->string(50)->append('COLLATE NOCASE'),
            'population' => $this->integer(),
            'star_type' => $this->string(50)->append('COLLATE NOCASE'),
            'created_at' =>  $this->integer()->notNull(),
            'updated_at' =>  $this->integer()->notNull(),
        ]);
        $this->createIndex('systems_name', 'systems', 'name', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%systems}}');
    }
}
