<?php

namespace App\Traits\Acessors;

trait UserAcessors
{
    /**
     * Get owned workspace
     *
     * @return App\Workspace
     */
    public function getWorkspaceAttribute()
    {
        return $this->workspaces()->wherePivot('role', self::ROLE_OWNER)->first();
    }
}
