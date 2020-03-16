<?php


namespace App\Traits\Relations;

trait SettingRelations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function settingable()
    {
        return $this->morphTo();
    }
}
