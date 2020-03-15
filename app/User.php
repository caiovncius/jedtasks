<?php

namespace App;

use App\Traits\Acessors\UserAcessors;
use App\Traits\Boot\UserBoot;
use App\Traits\Relations\UserRelations;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 *
 * @property string $password
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, UserBoot, UserRelations, UserAcessors;

    /**
     * User workspaces roles
     */
    const ROLE_OWNER = 'OWNER';
    const ROLE_ADMIN = 'ADMIn';
    const ROLE_USER = 'USER';

    /**
     * User workspaces invite status
     */
    const INVITE_NEW = 'NEW';
    const INVITE_ACCEPTED = 'ACCEPTED';
    const INVITE_SELF = 'SELF';
    const INVITE_REJECTED = 'REJECTED';


    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'public_id', 'bio', 'position'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var array
     */
    protected $guarded = [
        'public_id'
    ];
}
