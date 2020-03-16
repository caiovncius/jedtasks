<?php


namespace App\Helpers;


use App\Workspace;
use Illuminate\Support\Str;

class WorkspaceShortName
{
    /**
     * Check if short name is unique
     *
     * @param string $shortName
     * @return bool
     */
    public static function isUnique(string $shortName)
    {
        return Workspace::query()->where('short_name', $shortName)->count() === 0;
    }

    /**
     * Generate new short name
     *
     * @param string $name
     * @return string
     */
    public static function generate(string $name)
    {
        $count = 1;
        $shortName = '';
        while (true) {
            $shortName = $count === 1 ? Str::slug($name) : Str::slug($name . ' ' . $count) ;
            if (self::isUnique($shortName)) break;
            $count++;
        }
        return $shortName;
    }
}
