<?php

use yii\db\Migration;

/**
 * Class m230408_231608_Pegawai_migration
 */
class m230408_231608_Pegawai_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%pegawai}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'nip' => $this->string(255)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%pegawai}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230408_231608_Pegawai_migration cannot be reverted.\n";

        return false;
    }
    */
}
