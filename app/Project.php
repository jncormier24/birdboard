<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'title',
        'description',
        'owner_id'
    ];

    /** returns the path tot he project */
    public function path()
    {
        return "/projects/{$this->id}";
    }
}
