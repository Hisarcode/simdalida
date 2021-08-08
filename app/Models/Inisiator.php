<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inisiator extends Model
{
    use HasFactory;

    protected $fillable = ['inisiator'];

    protected $hidden = [];

    public function users()
    {
        return $this->hasMany(User::class, 'inisiator_id', 'id');
    }
}
