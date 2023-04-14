<?php

use yii\db\Migration;

/**
 * Class m230408_231715_Pasien_migration
 */
class m230408_231715_Pasien_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%pasien}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'wilayah_id' => $this->integer()->notNull(),

        ]);
        // Menambahkan foreign key ke tabel wilayah
        $this->addForeignKey(
            'fk-pasien-wilayah_id',
            'pasien',
            'wilayah_id',
            'wilayah',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%pasien}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230408_231715_Pasien_migration cannot be reverted.\n";

        return false;
    }
    */
}
