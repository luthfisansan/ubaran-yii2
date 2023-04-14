<?php

use yii\db\Migration;

/**
 * Class m230409_003529_User_role_migration
 */
class m230409_003529_User_role_table extends Migration
{
    public function up()
    {
        $this->createTable('user_role', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'role_id' => $this->integer()->notNull(),
        ]);

        // Menambahkan foreign key ke tabel user
        $this->addForeignKey(
            'fk-user_role-user_id',
            'user_role',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Menambahkan foreign key ke tabel role
        $this->addForeignKey(
            'fk-user_role-role_id',
            'user_role',
            'role_id',
            'role',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-user_role-user_id', 'user_role');
        $this->dropForeignKey('fk-user_role-role_id', 'user_role');
        $this->dropTable('user_role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230409_003529_User_role_migration cannot be reverted.\n";

        return false;
    }
    */
}
