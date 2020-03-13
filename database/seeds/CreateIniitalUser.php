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

            $service->register('DoTaks User One', 'email@jedtask.test', '111111', 'First Workspace');
//
//            $user = \App\User::create([
//                'name' => 'DoTaks User One',
//                'email' => 'email@jedtask.test',
//                'password' => \Illuminate\Support\Facades\Hash::make('111111'),
//                'email_verified_at' => now(),
//                'remember_token' => \Illuminate\Support\Str::random(10),
//            ]);
//
//            $workspace = \App\Workspace::create([
//                'name' => 'First Workspace'
//            ]);
//
//            $user->workspaces()->attach(
//                $workspace->id,
//                [
//                    'role' => \App\User::ROLE_OWNER,
//                    'invite_status' => \App\User::INVITE_SELF,
//                    'created_at' => now(),
//                    'updated_at' => now()
//                ]
//            );
        }

    }
}
