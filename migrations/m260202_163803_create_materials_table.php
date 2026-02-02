<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%materials}}`.
 */
class m260202_163803_create_materials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%materials}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->append('COLLATE NOCASE'),
            'type' => $this->string(50)->notNull()->append('COLLATE NOCASE'),
            'location' => $this->string(50)->append('COLLATE NOCASE'),
            'created_at' =>  $this->integer()->notNull(),
            'updated_at' =>  $this->integer()->notNull(),
        ]);
        $this->createIndex('materials_name_idx', 'materials', 'name');
        $this->createIndex('materials_name_type_idx', 'materials', ['name', 'type'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%materials}}');
    }
}
