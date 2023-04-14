<?php

use yii\db\Migration;

/**
 * Class m230409_003412_Role_migration
 */
class m230409_003412_Role_table extends Migration

{
    public function up()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'permission_id' => $this->integer(), // menambahkan kolom 'permission_id' sebagai integer
        ]);

        // menambahkan foreign key constraint
        $this->addForeignKey(
            'fk_role_permission', // nama foreign key constraint
            '{{%role}}', // nama tabel asal
            'permission_id', // nama kolom pada tabel asal
            '{{%permission}}', // nama tabel tujuan
            'id', // nama kolom pada tabel tujuan
            'CASCADE', // aksi saat data pada tabel asal dihapus (CASCADE untuk menghapus data di tabel tujuan)
            'CASCADE' // aksi saat data pada tabel asal diupdate (CASCADE untuk mengupdate data di tabel tujuan)
        );
    }

    public function down()
    {
        // menghapus foreign key constraint
        $this->dropForeignKey('fk_role_permission', '{{%role}}');

        // menghapus tabel 'role'
        $this->dropTable('{{%role}}');
    }
}
