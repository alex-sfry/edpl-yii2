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
            'name' => $this->string(255)->notNull(),
            'primary_economy' => $this->string(50),
            'secondary_economy' => $this->string(50),
            'government' => $this->string(50),
            'allegiance' => $this->string(50),
            'security' => $this->string(50),
            'population' => $this->integer(),
            'star_type' => $this->string(50),
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
