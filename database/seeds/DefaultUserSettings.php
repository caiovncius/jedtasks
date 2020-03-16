<?php

use Illuminate\Database\Seeder;

class DefaultUserSettings extends Seeder
{

    /**
     * @var \App\User
     */
    private $user;

    /**
     * DefaultUserSettings constructor.
     * @param \App\User $user
     */
    public function __construct(\App\User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = config('settings');

        foreach ($settings as $key => $setting) {
            if (is_null($this->user->settings()->where('key', $key)->first())) {
                $this->user->settings()->create(['key' => $key, 'value' => $setting]);
            }
        }
    }
}
