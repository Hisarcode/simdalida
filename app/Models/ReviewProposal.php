<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewProposal extends Model
{
    use HasFactory;

    protected $fillable = ['user_create_id', 'user_review_id', 'proposal_id', 'name', 'innovation_step', 'innovation_initiator', 'innovation_type', 'innovation_formats', 'is_covid', 'innovation_concern', 'start_innovation_trial', 'time_innovation_implement', 'innovation_design', 'innovation_goal', 'innovation_benefit', 'innovation_result', 'budget', 'profil_bisnis'];

    protected $hidden = [];
}
