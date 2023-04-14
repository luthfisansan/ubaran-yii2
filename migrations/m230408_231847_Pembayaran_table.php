<?php

use yii\db\Migration;

/**
 * Class m230408_231847_Pembayaran_migration
 */
class m230408_231847_Pembayaran_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%pembayaran}}', [
            'id' => $this->primaryKey(),
            'pasien_id' => $this->integer()->notNull(),
            'total_harga' => $this->decimal(10, 2)->notNull(),
            'tanggal_bayar' => $this->date()->notNull(),

        ]);

        $this->addForeignKey(
            'fk_pembayaran_pasien',
            '{{%pembayaran}}',
            'pasien_id',
            '{{%pasien}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk_pembayaran_pasien', '{{%pembayaran}}');
        $this->dropTable('{{%pembayaran}}');
    }
}
