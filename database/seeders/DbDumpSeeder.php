<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DbDumpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        exec("mysql -u".config('app.db_username')." -p".config('app.db_password')." ".config('app.database').
            " < ".public_path('sql/keywordtargetr.sql'));
    }
}
