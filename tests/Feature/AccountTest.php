<?php

namespace Tests\Feature;

use App\Account\Contracts\AccountCreatable;
use Faker\Factory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test register new account service
     *
     * @return void
     */
    public function testRegister()
    {
        Notification::fake();

        $service = app()->make(AccountCreatable::class);
        $faker = Factory::create();
        $account = $service->register($faker->name, $faker->email, $faker->password, $faker->company);

        $this->assertNotNull($account);
        $this->assertInstanceOf(\App\User::class, $account);
        $this->assertNotNull($account->workspaces()->first());
        $this->assertTrue(Str::isUuid($account->public_id));
        $this->assertTrue(Str::isUuid($account->workspaces()->first()->public_id));
        $this->assertNull($account->email_verified_at);
        $this->assertTrue($account->workspaces()->first()->pivot->role === \App\User::ROLE_OWNER);
        $this->assertTrue($account->workspaces()->first()->pivot->invite_status === \App\User::INVITE_SELF);

    }
}
