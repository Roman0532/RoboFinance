<?php


use Phinx\Migration\AbstractMigration;

class CreateArticlesTable extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('articles');
        $users->addColumn('title', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('content', 'text', ['null' => false])
            ->addColumn('image', 'string', ['null' => true])
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('count_view', 'integer', ['default' => 0])
            ->addIndex('title', ['unique' => true])
            ->addForeignKey('user_id', 'users', 'id')->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('articles');
    }
}
