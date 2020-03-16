<?php

namespace Tests\Feature;

use App\Account\Contracts\AccountCreatable;
use App\Account\Contracts\AccountPasswordUpdatable;
use App\Account\Contracts\AccountProfileUpdatable;
use Faker\Factory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test register new account process
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
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

    /**
     * Test update user data
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testUpdateProfile()
    {
        Storage::fake('avatars');

        $service = app()->make(AccountProfileUpdatable::class);
        $user = \factory(\App\User::class)->create();
        $faker = Factory::create();

        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'bio' => $faker->text(20)
        ];

        $updatedUser = $service->update($user, $data, UploadedFile::fake()->image('photo1.jpg'));

        $this->assertEquals($data['name'], $updatedUser->name);
        $this->assertEquals($data['email'], $updatedUser->email);
        $this->assertEquals($data['bio'], $updatedUser->bio);
        $this->assertNotNull($updatedUser->avatar);
    }

    /**
     * Test user update password
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testPasswordReset()
    {
        Notification::fake();
        $service = app()->make(AccountPasswordUpdatable::class);
        $user = \factory(\App\User::class)->make(['password' => Hash::make('111111')]);
        $result = $service->updatePassword($user, '111111', '123456');
        $this->assertInstanceOf(\App\User::class, $result);
        $this->assertNotInstanceOf(\Exception::class, $result);

    }
}
