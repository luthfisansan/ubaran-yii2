<?php

use yii\db\Migration;

/**
 * Class m230408_231541_Obat_migration
 */
class m230408_231541_Obat_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%obat}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'harga' => $this->decimal(10, 2)->notNull(),
            // tambahkan kolom-kolom lain yang diperlukan
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%obat}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230408_231541_Obat_migration cannot be reverted.\n";

        return false;
    }
    */
}
