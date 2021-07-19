<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['phone', 'email', 'about_content', 'about_image', 'facebook', 'instagram', 'youtube', 'whatsapp'];
}
