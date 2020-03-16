<?php

use Illuminate\Database\Seeder;

class CreateIniitalUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (is_null(\App\User::where('email', 'email@jedtask.test')->first())) {
            /** @var \App\Account\Contracts\AccountCreatable */
            $service = app()->make(\App\Account\Contracts\AccountCreatable::class);

            $service->register(
                'DoTaks User One',
                'email@jedtask.test',
                '111111',
                'My First Workspace'
            );
        }

    }
}
