<?php
use Illuminate\Database\Seeder;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Company::class,5)
        ->create()
        ->each(function($company){
            $company->employees()->saveMany(factory(App\Employee::class,5)->make());
        });
    }
}
