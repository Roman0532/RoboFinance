<?php


use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'login' => 'admin',
                'full_name' => 'admin',
                'password' => password_hash('admin',PASSWORD_DEFAULT),
                'isAdmin' => true,
            ],
            [
                'login' => 'admin1',
                'full_name' => 'admin1',
                'password' => password_hash('admin1',PASSWORD_DEFAULT),
                'isAdmin' => true,
            ],
            [
                'login' => 'guest',
                'full_name' => 'guest',
                'password' => password_hash('guest',PASSWORD_DEFAULT),
                'isAdmin' => false,
            ]
        ];

        $this->table('users')->insert($data)->save();
    }
}
