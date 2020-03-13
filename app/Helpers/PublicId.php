<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PublicId
{

    /**
     * @param Model $model
     * @param string $uuid
     * @return bool
     */
    public static function isUnique( $model, string $uuid)
    {
        return $model->where('public_id', $uuid)->count() > 0;
    }

    /**
     * @param Model $model
     * @return \Ramsey\Uuid\UuidInterface|string
     */
    public static function getUnique(Model $model)
    {
        $uuid = '';
        while (true) {
            $uuid = Str::uuid()->toString();
            if (!self::isUnique($model, $uuid)) {
                break;
            }
        }
        return $uuid;
    }
}
