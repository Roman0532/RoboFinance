<?php


use Phinx\Migration\AbstractMigration;

class CreateTableUsers extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('full_name', 'string', ['limit' => 60, 'null' => false])
            ->addColumn('login', 'string', ['limit' => 25, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 100])
            ->addColumn('isAdmin', 'boolean', ['default' => false])
            ->addIndex('login', ['unique' => true])
            ->create();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
