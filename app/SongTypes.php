<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongTypes extends Model
{
    protected $filllable = [
        "name",
    ];

    public function songs()
    {
        return $this->hasMany("App\Songs");
    }
}
