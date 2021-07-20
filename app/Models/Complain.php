<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'subject', 'description', 'is_improvement', 'purpose_innovation'];

    protected $hidden = [];

    public function innovation_complain()
    {
        return $this->belongsTo(InnovationProposal::class, 'purpose_innovation', 'id');
    }
}
