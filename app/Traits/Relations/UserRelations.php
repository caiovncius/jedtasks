<?php


namespace App\Traits\Relations;


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
}
