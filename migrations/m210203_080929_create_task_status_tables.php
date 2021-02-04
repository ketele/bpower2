<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m210203_080929_create_task_status_tables
 */
class m210203_080929_create_task_status_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210203_080929_create_task_status_tables cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('task', [
            'id' => Schema::TYPE_PK,
            'status_id' => Schema::TYPE_INTEGER . ' DEFAULT 1',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'user' => Schema::TYPE_STRING,
        ]);

        $this->createTable('status', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'removable' => Schema::TYPE_BOOLEAN . ' DEFAULT true',
        ]);

        // creates index for column `status_id`
        $this->createIndex(
            'idx-task-status_id',
            'task',
            'status_id'
        );

        // add foreign key for table `status`
        $this->addForeignKey(
            'fk-task-status_id',
            'task',
            'status_id',
            'status',
            'id',
            'RESTRICT'
        );

        $this->batchInsert('status', [
            'name', 'removable'
        ], [
                ['To do', false],
                ['In progress', false],
                ['Done', false]
            ]
        );

    }

    public function down()
    {
        // drops foreign key for table `status`
        $this->dropForeignKey(
            'fk-task-author_id',
            'task'
        );

        // drops index for column `status_id`
        $this->dropIndex(
            'idx-task-status_id',
            'task'
        );

        $this->dropTable('task');
        $this->dropTable('status');
    }
}
