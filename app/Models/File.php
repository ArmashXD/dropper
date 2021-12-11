<?php

namespace App\Models;

use App\Helpers\Common;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name',
        'path'
    ];

    public function links()
    {
        return $this->hasMany(Link::class);
    }

   
}
