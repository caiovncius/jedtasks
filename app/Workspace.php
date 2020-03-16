<?php

namespace App;

use App\Traits\Boot\WorkspaceBoot;
use App\Traits\Relations\WorkspaceRelations;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use WorkspaceBoot, WorkspaceRelations;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'public_id', 'status', 'short_name'
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
