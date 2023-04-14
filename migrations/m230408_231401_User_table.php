<?php

use yii\db\Migration;

/**
 * Class m230408_231401_User_migration
 */
class m230408_231401_User_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            // tambahkan kolom-kolom lain yang diperlukan
        ]);
        // Data username dan password hash
        $username = 'user1';
        $passwordHash = Yii::$app->security->generatePasswordHash('password123');
        $this->insert('user', [
            'username' => $username,
            'password_hash' => $passwordHash,
            'email' => 'user1@example.com',
            // set nilai kolom lain yang diperlukan
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230408_231401_User_migration cannot be reverted.\n";

        return false;
    }
    */
