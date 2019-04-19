<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    //

    public function shared() {
        $this->belongsTo('\App\Models\Task');
    }

    protected $table = 'shared';
}
