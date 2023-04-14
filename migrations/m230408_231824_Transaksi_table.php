<?php

use yii\db\Migration;

/**
 * Class m230408_231824_Transaksi_migration
 */
class m230408_231824_Transaksi_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%transaksi}}', [
            'id' => $this->primaryKey(),
            'pasien_id' => $this->integer()->notNull(),
            'tindakan_id' => $this->integer()->notNull(),
            'obat_id' => $this->integer()->notNull(),
            'jumlah' => $this->integer()->notNull(),
            'total_harga' => $this->decimal(10, 2)->notNull(),

        ]);

        $this->addForeignKey(
            'fk_transaksi_pasien',
            '{{%transaksi}}',
            'pasien_id',
            '{{%pasien}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_transaksi_tindakan',
            '{{%transaksi}}',
            'tindakan_id',
            '{{%tindakan}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_transaksi_obat',
            '{{%transaksi}}',
            'obat_id',
            '{{%obat}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk_transaksi_obat', '{{%transaksi}}');
        $this->dropForeignKey('fk_transaksi_tindakan', '{{%transaksi}}');
        $this->dropForeignKey('fk_transaksi_pasien', '{{%transaksi}}');
        $this->dropTable('{{%transaksi}}');
    }
}
