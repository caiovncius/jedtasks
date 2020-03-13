<?php

namespace App;

use App\Traits\Boot\WorkspaceBoot;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use WorkspaceBoot;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'public_id', 'status'
    ];

    /**
     * @var array
     */
    protected $guarded = [
        'public_id', 'status'
    ];

    /**
     * @var array
     */
    protected $casts = [];
}
