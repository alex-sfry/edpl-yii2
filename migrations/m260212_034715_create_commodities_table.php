<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%commodities}}`.
 */
class m260212_034715_create_commodities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%commodities}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(50)->notNull()->append('COLLATE NOCASE'),
            'name' => $this->string(255)->notNull()->append('COLLATE NOCASE'),
        ]);
        $this->createIndex('commodities_name_idx', 'commodities', ['name'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%commodities}}');
    }
}
