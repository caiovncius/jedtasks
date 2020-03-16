<?php


namespace App\Traits\Relations;


use App\Setting;
use App\Workspace;

trait UserRelations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function workspaces()
    {
        return $this->belongsToMany(Workspace::class, 'user_workspaces', 'user_id')
            ->withPivot(['role', 'invite_owner', 'invite_status']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function settings()
    {
        return $this->morphMany(Setting::class, 'settingable');
    }
}
