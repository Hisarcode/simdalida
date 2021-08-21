<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InnovationReport extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'name', 'innovation_sk_file', 'innovation_step', 'innovation_initiator', 'innovation_type', 'innovation_formats', 'time_innovation_implement', 'problem', 'solution', 'improvement', 'complain_innovation_total', 'complain_innovation_file', 'complain_improvement_total', 'complain_improvement_file', 'achievement_goal_level', 'achievement_goal_level_file', 'achievement_goal_problem', 'benefit_level', 'benefit_level_file', 'achievement_result_level', 'achievement_result_level_file', 'achievement_result_problem', 'innovation_strategy', 'video_innovation', 'innovation_proposals_id'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function innovation_proposal()
    {
        return $this->belongsTo(InnovationProposal::class, 'innovation_proposals_id', 'id');
    }

    public function innovation_proposal()
    {
        return $this->belongsTo(InnovationProposal::class, 'innovation_proposals_id', 'id');
    }

    public function setStepAttribute($value)
    {
        $this->attributes['innovation_step'] = json_encode($value);
    }

    public function getStepAttribute($value)
    {
        return $this->attributes['innovation_step'] = json_decode($value);
    }


    public function setInitiatorAttribute($valueb)
    {
        $this->attributes['innovation_initiator'] = json_encode($valueb);
    }

    public function getInitiatorAttribute($valueb)
    {
        return $this->attributes['innovation_initiator'] = json_decode($valueb);
    }
}
