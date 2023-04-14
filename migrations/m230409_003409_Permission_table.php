<?php

use yii\db\Migration;

/**
 * Class m230409_003449_Permission_migration
 */
class m230409_003409_Permission_table
extends Migration
{
    public function up()
    {
        $this->createTable('{{%permission}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%permission}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230409_003449_Permission_migration cannot be reverted.\n";

        return false;
    }
    */
}
