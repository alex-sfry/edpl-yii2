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
            'name' => $this->string(255)->notNull()->append('COLLATE NOCASE'),
            'category' => $this->string(50)->notNull()->append('COLLATE NOCASE')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%commodities}}');
    }
}
