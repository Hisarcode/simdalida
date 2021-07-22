<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InnovationProfile extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'innovation_proposals_id', 'description', 'name'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function innovation_proposal()
    {
        return $this->belongsTo(InnovationProposal::class, 'innovation_proposals_id', 'id');
    }

    public function innovation_report()
    {
        return $this->hasMany(InnovationReport::class, 'innovation_profiles_id', 'id');
    }
}
