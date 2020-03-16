<?php


namespace App\Traits\Relations;


use App\Setting;

trait WorkspaceRelations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function settings()
    {
        return $this->morphMany(Setting::class, 'settingable');
    }
}
