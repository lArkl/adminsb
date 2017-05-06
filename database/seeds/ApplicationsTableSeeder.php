<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Application::class, 2)
        ->create()->each(function($u) {
    			$u->applications()->save(factory(App\Applications::class)->make());
  			});
  			factory(App\Application::class, 50)->create()->each(function ($u) {
        $u->applications()->save(factory(App\Applications::class)->make());});*/
        
       $users = [
            
                'first_name' => str_random(10),
                'middle_name' => str_random(10),
                'first_surname' => str_random(10),
                'second_surname' => str_random(10),
                'birth_date' => str_random(10),
                'document' => str_random(10),
                'home_phone' => str_random(10),
                'mobile_phone' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'workshop_name' => str_random(10),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ];

        DB::table('applications')->insert($users);

        //$this->enableForeignKeys();
    }
}
