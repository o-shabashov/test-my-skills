<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $path = 'database/seeds/db.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Db seeded');
    }
}
