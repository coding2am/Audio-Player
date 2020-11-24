<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    protected $filllable = [
        "title",
        "path",
        "song_type_id"
    ];

    public function song_type()
    {
        return $this->belongsTo("App\SongTypes");
    }
}
