<?php

use yii\db\Migration;

class m260131_232721_import_commoditites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $sql = file_get_contents(\Yii::getAlias('@app') . '/sql_dumps/commodities_ref.sql');
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m260131_232721_import_commoditites_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260131_232721_import_commoditites_table cannot be reverted.\n";

        return false;
    }
    */
}
