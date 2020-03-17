<?php

function setting(string $key, Model $model = null)
{
    if (is_null($model)) $model = \App\User::find(auth()->id());
    $setting = $model->settings()->where('key', $key)->first();
    return $setting->value ?? null;
}
