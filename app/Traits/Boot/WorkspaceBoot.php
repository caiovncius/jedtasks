<?php


namespace App\Traits\Boot;


use App\Helpers\PublicId;
use App\User;
use App\Workspace;

trait WorkspaceBoot
{
    /**
     * Add public_id in user when creating
     */
    public static function booted()
    {
        static::creating(function (Workspace $workspace) {
            $workspace->public_id = PublicId::getUnique($workspace);
            return $workspace;
        });
    }
}
