<?php


namespace App\Traits\Boot;


use App\Helpers\PublicId;
use App\Helpers\WorkspaceShortName;
use App\User;
use App\Workspace;

trait WorkspaceBoot
{
    /**
     * run generated data to Workspace
     */
    public static function booted()
    {
        static::creating(function (Workspace $workspace) {
            $workspace->public_id = PublicId::getUnique($workspace);
            $workspace->short_name = WorkspaceShortName::generate($workspace->name);
            return $workspace;
        });
    }
}
