<?php

namespace App;

use App\Traits\Relations\SettingRelations;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App
 *
 * @property string $key
 * @property string $value
 */
class Setting extends Model
{
    use SettingRelations;
    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var array
     */
    protected $fillable = ['key', 'value'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
