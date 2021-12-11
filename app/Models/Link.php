<?php

namespace App\Models;

use App\Utils\RandomStringGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'file_id',
    ];


    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function scopeGetByUniqueName($query, $val)
    {
        return $query->where('name', $val);
    }

}
