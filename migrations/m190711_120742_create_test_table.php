<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 */
class m190711_120742_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'internal_id' => $this->integer(),
            'last_modify' => $this->string(20),
            'regulator' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test}}');
    }
}
