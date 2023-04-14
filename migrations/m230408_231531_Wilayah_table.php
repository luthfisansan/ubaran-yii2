<?php

use yii\db\Migration;

/**
 * Class m230408_231531_Wilayah_migration
 */
class m230408_231531_Wilayah_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%wilayah}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            // tambahkan kolom-kolom lain yang diperlukan
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%wilayah}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230408_231531_Wilayah_migration cannot be reverted.\n";

        return false;
    }
    */
}
